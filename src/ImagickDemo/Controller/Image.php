<?php

namespace ImagickDemo\Controller;

use Intahwebz\Request;
use ImagickDemo\Response\JsonResponse;
use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Tier;
use ImagickDemo\Navigation\CategoryNav;

/**
 * Used to generate a list function calls for testing offline
 * @param $imageFunction
 * @param $category
 * @param $example
 */
function logCallable(
    $imageFunction,
    $category,
    $example
) {
    if (file_exists("test.data.php") == false) {
        file_put_contents("test.data.php", "<?php \n\n\$data = [];\n\n", FILE_APPEND);
    }

    $string = "\$data[] = [\n";
    $string .= var_export($imageFunction, true);
    $string .= ",\n";
    $string .= var_export($params, true);
    $string .= ",\n";
    $string .= "];\n\n";

    file_put_contents("test.data.php", $string, FILE_APPEND);
}


function cacheImageFile(
    $imageFunction,
    $category,
    $example
) {

    $filename = getImageCacheFilename($category, $example, $params);
    $lowried = [];
    foreach ($params as $key => $value) {
        $lowried[':'.$key] = $value;
    }

    return renderImageAsFileResponse($imageFunction, $filename, $injector, $lowried);
}

function processImageTask(
    Request $request,
    $imageFunction,
    ImagickTaskQueue $taskQueue,
    $category,
    $example
) {

    //use ($params)
    
    $debug = 'Unknown state';
    
    $job = $request->getVariable('job', false);
    if ($job === false) {
        if ($taskQueue->isActive() == false) {
            //Queue isn't active - don't bother queueing a task
            return null;
        }
    
        $task = \ImagickDemo\Queue\ImagickTask::create(
            $category,
            $example,
            $imageFunction,
            $params
        );
    
        $debug .= "task created.";
    
        $taskQueue->addTask($task);
    }
    
    if ($request->getVariable('noredirect') == true) {
        return new \ImagickDemo\Response\ErrorResponse(503, "image still processing $job is ".$job.$debug);
    }
    
    return redirectWaitingTask($request, intval($job));
}


function directImageCallable(CategoryNav $categoryNav, \Auryn\Injector $injector, $params)
{
    $imageFunction = $categoryNav->getImageFunctionName();
    $filename = getImageCacheFilename(
        $categoryNav->getPageInfo(),
        $params
    );

    global $imageType;

    ob_start();
    $injector->execute($imageFunction);

    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }
    $imageData = ob_get_contents();

    ob_end_clean();

    return new \ImagickDemo\Response\ImageResponse($filename, "image/".$imageType, $imageData);
}



/**
 * Class Image
 * @package ImagickDemo\Controller
 */
class Image
{

    /**
     * @var PageInfo
     */
    private $pageInfo;
    
    public function __construct(PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }
    
    /**
     * @param $category
     * @param $example
     * @param $imageFunction
     * @param \ImagickDemo\Control $control
     * @param \ImagickDemo\Example $exampleController
     * @internal param array $customImageParams
     * @return JsonResponse
     */
    public function getImageJobStatus(
        $category,
        $example,
        $imageFunction,
        \ImagickDemo\Control $control,
        \ImagickDemo\Example $exampleController
    ) {

        $data = [];
        $customImageParams = $exampleController->getCustomImageParams();
        
        $fullParams = $control->getFullParams($customImageParams);
        
        $filename = getImageCacheFilename($category, $example, $fullParams);
        $data['filename'] = $filename;
        $data['finished'] = false;
        $data['params'] = $fullParams;

        foreach (getKnownExtensions() as $extension) {
            if (file_exists($filename.'.'.$extension) == true) {
                $data['finished'] = true;
                break;
            }
        }

        return new JsonResponse($data);
    }


    /**
     * @param \Auryn\Injector $injector
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    private function getImageResponseInternal(CategoryNav $categoryNav, \Auryn\Injector $injector, $params)
    {
        $callables = [];

        $cachedImageCallable = function () use ($categoryNav, $params) {
            $category = $categoryNav->getCategory();
            $example = $categoryNav->getExample();

            return getCachedImageResponse($category, $example, $params);
        };

        $directImageCallable = function () use ($categoryNav, $injector, $params) {
            return directImageCallable($categoryNav, $injector, $params);
        };

        $originalCallable = function (\Intahwebz\Request $request, \Auryn\Injector $injector) {
            \ImagickDemo\Imagick\functions::load();
            
            $original = $request->getVariable('original', false);
            if ($original) {
                //TODO - these are not cached.
                
                //TODO - Bug waiting for pull https://github.com/rdlowrey/Auryn/pull/104
                //means we can't execute directly.
                //return $injector->execute(['ImagickDemo\Example', 'renderOriginalImage']);
                
                $instance = $injector->make('ImagickDemo\Example');
                return $injector->execute([$instance, 'renderOriginalImage']);
            }

            return null;
        };
        
        
        global $cacheImages;
        if ($cacheImages == false) {
            $callables[] = $originalCallable;
            $callables[] = $directImageCallable;
        }
        else {
            $callables[] = $originalCallable;//'checkGetOriginalImage';
//            $callables[] = $getCachedImageResponse;// //This also reads the image when generated by a task
//            $callables[] = $processImageTask;
            //cacheImageFile
            //processImageTask
            
            $callables[] = $cachedImageCallable;
            $callables[] = $directImageCallable;//'directImageFunction';
        }

        $result = null;

        foreach ($callables as $callable) {
            $result = $injector->execute($callable);
            if ($result) {
                return $result;
            }
        }

        throw new \Exception("No image callable resulted in an image response.");
    }

    /**
     * @param \Auryn\Injector $injector
     * @param $customImageFunction
     * @param \ImagickDemo\Example $exampleController
     * @param \ImagickDemo\Control $control
     * @return mixed
     * @throws \Exception
     */
    public function getCustomImageResponse(
        CategoryNav $categoryNav,
        \Auryn\Injector $injector,
        $customImageFunction,
        \ImagickDemo\Example $exampleController,
        \ImagickDemo\Control $control
    ) {
        $injector->defineParam('imageFunction', $customImageFunction);
        $params = $control->getFullParams($exampleController->getCustomImageParams());
        $defaultCustomParams = array('customImage' => true);
        $params = array_merge($defaultCustomParams, $params);

        return $this->getImageResponseInternal($categoryNav, $injector, $params);
    }

    /**
     * @param \Auryn\Injector $injector
     * @param \ImagickDemo\Control $control
     * @throws \Exception
     * @internal param Request $request
     * @return array|callable
     */
    public function getImageResponse(CategoryNav $categoryNav, \Auryn\Injector $injector)
    {
        $control = $injector->make('ImagickDemo\Control');
        $params = $control->getFullParams([]);


        return $this->getImageResponseInternal($categoryNav, $injector, $params);
    }
}
