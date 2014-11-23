<?php

namespace ImagickDemo\Controller;

use Intahwebz\Request;
use ImagickDemo\Response\FileResponse;
use ImagickDemo\Response\RedirectResponse;
use ImagickDemo\Config\Application as ApplicationConfig;


function createImageTaskAndRedirectResponse(
    Request $request,
    \Auryn\Provider $injector,
    $category,
    $function,
    \ImagickDemo\Control $control
) {
    $job = $request->getVariable('job');
    if ($job === false) {
        $task = $injector->make(
            'ImagickDemo\Queue\ImagickTask',
            [
                ':category' => $category,
                ':functionName' => $function
            ]
        );

        $queue = $injector->make('ImagickDemo\Queue\RedisTaskQueue');
        $queue->pushTask($task);
        $job = 0;
    }
    else {
        $job++;
    }

    if ($job > 20) {
        //probably ought to time out at some point.
    }

    $url = $control->getURL();
    if (strpos($url, '?') !== false) {
        $newURL = $url."&job=".$job;
    }
    else {
        $newURL = $url."?job=".$job;
    }

    return new RedirectResponse($newURL, 500000);
}

class Image {

    /**
     * @param \Auryn\Provider $injector
     * @return FileResponse
     */
    function getOriginalImageResponse(\Auryn\Provider $injector) {
        $control = $injector->make(\ImagickDemo\Control::class);
        //TODO - this is dangerous. It assumes that image path exists on the control
        //Which isn't always true.
        $imagePath = $control->getImagePath();
        return new FileResponse($imagePath, "Content-Type: image/jpeg");
    }


    /**
     * @param \Auryn\Provider $injector
     * @param Request $request
     * @param $category
     * @param $example
     * @return FileResponse|RedirectResponse|null
     * @throws \Exception
     */
    function getCachedImageResponse(\Auryn\Provider $injector, Request $request, $category, $example) {
        $control = $injector->make(\ImagickDemo\Control::class);
        $filename = getImageCacheFilename($category, $example, $control->getParams());
        $response = createFileResponseIfFileExists($filename);

        if ($response) {
            return $response;
        }

        return null;
    }

    /**
     * @param \Auryn\Provider $injector
     * @param Request $request
     * @param $category
     * @param $example
     * @return FileResponse|RedirectResponse|null
     */
    function getImageResponse(
        \Auryn\Provider $injector,
        Request $request,
        ApplicationConfig $appConfig,
        $category,
        $example
    ) {

        $cacheImages = $appConfig->getCacheImages();
        
        $namespace = sprintf('ImagickDemo\%s\functions', $category);
        $namespace::load();
        $original = $request->getVariable('original', false);

        $task = $appConfig->getQueueImages();
        
        if ($task) {
            //Only allow it to be turned off not on.
            $task = $request->getVariable('task', true);
        }

        //Yay - global state.
        $function = setupExampleInjection($injector, $category, $example);

        if ($original) {
            return $this->getOriginalImageResponse($injector);
        }

        $getCachedImageResponse = function() use ($category, $function, $injector, $example, $request)  {
            return $this->getCachedImageResponse($injector, $request, $category, $function);
        };

        $createImageTaskAndRedirectResponse = function() use ($category, $function, $injector, $example, $request) {
            $control = $injector->make(\ImagickDemo\Control::class);
            return createImageTaskAndRedirectResponse($request, $injector, $category, $function, $control);
        };

        $createAndCacheFile = function () use ($category, $function, $injector, $example) {
            $functionFullname = 'ImagickDemo\\'.$category.'\\'.$function;
            $control = $injector->make(\ImagickDemo\Control::class);
            $filename = getImageCacheFilename($category, $example, $control->getParams());
            $response = createAndCacheFile($injector, $functionFullname, $filename);
            
            return $response;
        };

        $directImage = function () use ($category, $function, $injector) {
            $functionFullname = 'ImagickDemo\\'.$category.'\\'.$function;

            return createImage($injector, $functionFullname);
        };

        $executables = [];

        if ($cacheImages) {
            $executables[] = $getCachedImageResponse;
        }
        
        if ($task) {
            $executables[] = $createImageTaskAndRedirectResponse;
        }

        if ($cacheImages) {
            $executables[] = $createAndCacheFile;
        }

        $executables[] = $directImage;

        foreach ($executables as $executable) {
            $response = $executable();
            if ($response) {
                return $response;
            }
        }

        return null;
    }
}