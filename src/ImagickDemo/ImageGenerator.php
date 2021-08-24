<?php


namespace ImagickDemo;


use Room11\HTTP\VariableMap;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryInfo;
use ImagickDemo\Queue\ImagickTaskQueue;
use Psr\Http\Message\ServerRequestInterface as Request;

use SlimAuryn\Response\ImageResponse;
use SlimAuryn\RouteParams;
use SlimAuryn\Response\TextResponse;

class ImageGenerator
{
    public function __construct(ImageCachePath $imageCachePath)
    {
        $this->imageCachePath = $imageCachePath;
    }

    public static function createImageTask(
        VariableMap $variableMap,
        ImagickTaskQueue $taskQueue,
        PageInfo $pageInfo,
        Request $request,
        $customImage,
        $params
    ) {
        $job = $variableMap->getVariable('job', false);
        
        $text = "Image is still generating.";
        if ($job === false) {
            if ($taskQueue->isActive() == false) {
                //Queue isn't active - don't bother queueing a task
                return null;
            }

            $task = new \ImagickDemo\Queue\ImagickTask(
                $pageInfo,
                $params,
                $customImage,
                $request->getUri()->getPath()
            );
            $added = $taskQueue->addTask($task);
            
            if ($added === true) {
                $text = "Image added to task list";
            }
            else {
                $text = "Image task $added already present.";
            }
        }

        $headers = [];

        $caching = new \Room11\Caching\LastModified\Disabled();
        foreach ($caching->getHeaders(time()) as $key => $value) {
            $headers[$key] = $value;
        }

        return new TextResponse(
            $text,
            $headers,
            420
        );
    }

    
    public function directImageCallable(
        PageInfo $pageInfo,
        \Auryn\Injector $injector,
        RouteParams $routeInfo,
        $params
    ) {
        App::setupCategoryExample($routeInfo);
        $imageFunction = CategoryInfo::getImageFunctionName($pageInfo);

        global $imageType;
        ob_start();
        $injector->execute($imageFunction);
    
        if ($imageType == null) {
            ob_end_clean();
            throw new \Exception("imageType not set, can't cache image correctly.");
        }
        $imageData = ob_get_contents();
        ob_end_clean();

        $simpleNameWithExtension = $pageInfo->getSimpleName($params).'.'.$imageType;

        return new ImageResponse(
            $imageData,
            "image/" . $imageType,
            [
                'Content-Length'      => (string)strlen($imageData),
                'Content-Disposition' => 'filename=' . $simpleNameWithExtension,
                'Content-Type'        => "image/" . $imageType,
            ]
        );
    }

    public function directCustomImageCallable(
        PageInfo $pageInfo,
        RouteParams $routeInfo,
        \Auryn\Injector $injector,
        $params
    ) {
        App::setupCategoryExample($routeInfo);

        $imageFunction = CategoryInfo::getCustomImageFunctionName($pageInfo);

        global $imageType;
    
        ob_start();
        $injector->execute($imageFunction);
    
        if ($imageType == null) {
            ob_end_clean();
            throw new \Exception("imageType not set, can't cache image correctly.");
        }
        $imageData = ob_get_contents();
    
        ob_end_clean();
        
        $simpleNameWithExtension = $pageInfo->getSimpleName($params).'.'.$imageType;

        return new ImageResponse(
            $imageData,
            "image/" . $imageType,
            [
                'Content-Length'      => (string)strlen($imageData),
                'Content-Disposition' => 'filename=' . $simpleNameWithExtension,
                'Content-Type'        => "image/" . $imageType,
            ]
        );
    }
    
    public function cachedImageCallable(
        PageInfo $pageInfo,
        $params
    ) {
        $filename = $this->imageCachePath->getImageCacheFilename($pageInfo, $params);
        $extensions = ["jpg", 'jpeg', "gif", "png", ];
        $contentType = false;
        $filenameFound = false;
        $extension = null;
    
        foreach ($extensions as $extension) {
            $filenameWithExtension = $filename.".".$extension;
            if (file_exists($filenameWithExtension) == true) {
                //TODO - content type should actually be image/jpeg
                $contentType = "image/".$extension;
                $filenameFound = $filenameWithExtension;
                break;
            }
        }
    
        if ($filenameFound == false || $extension == null) {
            return null;
        }

        $simpleNameWithExtension = $pageInfo->getSimpleName($params).'.'.$extension;

        $imageData = file_get_contents($filenameFound);

        return new ImageResponse(
            $imageData,
            'foo',
            [
                'Content-Length'      => (string)strlen($imageData),
                'Content-Disposition' => 'filename=' . $simpleNameWithExtension,
                'Content-Type'        => $contentType,
            ]
        );
    }
}
