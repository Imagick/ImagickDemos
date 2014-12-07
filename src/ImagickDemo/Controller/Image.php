<?php

namespace ImagickDemo\Controller;

use Intahwebz\Request;
use ImagickDemo\Response\FileResponse;
use ImagickDemo\Response\RedirectResponse;
use ImagickDemo\Config\Application as ApplicationConfig;
use ImagickDemo\Queue\TaskQueue;

/**
 * @param callable $imageCallable
 * @return \ImagickDemo\Response\ImageResponse
 * @throws \Exception
 */
function createImageResponse(callable $imageCallable) {
    global $imageType;

    ob_start();
    $imageCallable();
    if ($imageType == null) {
        ob_end_clean();
        throw new \Exception("imageType not set, can't cache image correctly.");
    }
    $imageData = ob_get_contents();
    ob_end_clean();

    return new \ImagickDemo\Response\ImageResponse("image/".$imageType, $imageData);
}

/**
 * @param Request $request
 * @param \Auryn\Provider $injector
 * @param $category
 * @param $function
 * @param \ImagickDemo\Control $control
 * @return RedirectResponse
 */
function createImageTaskAndRedirectResponse(
    Request $request,
    TaskQueue $taskQueue,
    $category,
    $function,
    \ImagickDemo\Control $control
) {
    $job = $request->getVariable('job');
    if ($job === false) {
        $task = new \ImagickDemo\Queue\ImagickTask(
            $category,
            $function,
            $control
            //$control->getFullParams($customImageParams)
        );

        $taskQueue->pushTask($task);
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

/**
 * Class Image
 * @package ImagickDemo\Controller
 */
class Image {

    /**
     * @param \Auryn\Provider $injector
     * @param Request $request
     * @param $category
     * @param $example
     * @return FileResponse|RedirectResponse|null
     * @throws \Exception
     */
    function getCachedImageResponse($filename) {
        $response = createFileResponseIfFileExists($filename);

        if ($response) {
            return $response;
        }

        return null;
    }

    /**
     * @param \Auryn\Provider $injector
     * @param $category
     * @param $example
     * @return FileResponse|null
     * @throws \Exception
     */
    function getCustomImageResponse(
        \Auryn\Provider $injector,
        Request $request,
        ApplicationConfig $appConfig,
        $category,
        $example,
        \ImagickDemo\Control $control,
        \ImagickDemo\Example $pageController) {

        $imageCallable = [$pageController, 'renderCustomImage'];

        $customImageParams = $pageController->getCustomImageParams();
        
        return $this->getImageResponse(
            $injector,
            $request,
            $appConfig,
            $category,
            $example,
            $control,
            $imageCallable,
            $customImageParams
        );
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
        $example,
        \ImagickDemo\Control $control,
        $imageCallable,
        $customImageParams = []
    ) {

        $cacheImages = $appConfig->getCacheImages();
        $task = $appConfig->getQueueImages();

        //$cacheImages = true;
        
        if ($task) {
            //Only allow it to be turned off not on.
            $task = $request->getVariable('task', true);
        }

        $getCachedImageResponse = function() use ($category, $example, $control, $customImageParams) {
            $filename = getImageCacheFilename($category, $example, $control->getFullParams($customImageParams));

            return $this->getCachedImageResponse($filename);
        };

        $createImageTaskAndRedirectResponse = function() use 
            ($category, $injector, $example, $request, $control, $customImageParams) {

            return createImageTaskAndRedirectResponse(
                $request,
                $injector,
                $category,
                $example,
                $control->getFullParams($customImageParams)
            );
        };

        $createAndCacheFile = function () use ($category, $imageCallable, $example, $control, $customImageParams) {
            $filename = getImageCacheFilename($category, $example, $control->getFullParams($customImageParams));
            $response = renderImageAsFileResponse($imageCallable, $filename);

            return $response;
        };
        

        $directImage = function () use ($category,  $injector, $imageCallable) {
            return createImageResponse($imageCallable);
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