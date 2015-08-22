<?php

namespace ImagickDemo\Controller;

use ImagickDemo\Response\JsonResponse;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Example;
use ImagickDemo\Control;
use Tier\InjectionParams;
use Tier\Tier;
use Tier\ResponseBody\CachingFileResponseFactory;

use Arya\JsonBody;

/**
 * Used to generate a list function calls for testing offline
 * @param $imageFunction
 * @param $category
 * @param $example
 */
function logCallable(
    $imageFunction,
    $category,
    $example,
    $params
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
    
    
    public function getOriginalImage(
        Example $example,
        CachingFileResponseFactory $fileResponseFactory
    ) {
        $filename = $example->getOriginalFilename();

        return $fileResponseFactory->create($filename, "image/jpg");
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
        PageInfo $pageInfo,
        Control $control,
        Example $exampleController
    ) {
        $data = [];
        $customImageParams = $exampleController->getCustomImageParams();
        $fullParams = $control->getFullParams($customImageParams);

        $filename = getImageCacheFilename($pageInfo, $fullParams);

        $data['filename'] = $filename;
        $data['finished'] = false;
        $data['params'] = $fullParams;

        foreach (getKnownExtensions() as $extension) {
            if (file_exists($filename.'.'.$extension) == true) {
                $data['finished'] = true;
                break;
            }
        }

        return new JsonBody($data);
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
        Example $exampleController,
        Control $control
    ) {
        $params = $control->getFullParams($exampleController->getCustomImageParams());
        $defaultCustomParams = array('customImage' => true);
        $params = array_merge($defaultCustomParams, $params);

        $injectionParams = InjectionParams::fromParams(
            array (
                'params' => $params,
                'customImage' => true
            )
        );

        $tiers = [];
        $tiers[] = new Tier('cachedImageCallable', $injectionParams);
        $tiers[] = new Tier('createImageTask');
        $tiers[] = new Tier('directCustomImageCallable');

        return $tiers;
    }


    public function getImageResponse(\ImagickDemo\Control $control)
    {
        $params = $control->getFullParams([]);
        $params['customImage'] = false;
        $injectionParams = InjectionParams::fromParams(
            array (
                'params' => $params,
                'customImage' => false
            )
        );
        $tiers = [];
        $tiers[] = new Tier('cachedImageCallable', $injectionParams);
        $tiers[] = new Tier('createImageTask');
        $tiers[] = new Tier('directImageCallable');

        return $tiers;
    }
}
