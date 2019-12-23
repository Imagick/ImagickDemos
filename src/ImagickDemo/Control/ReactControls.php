<?php


namespace ImagickDemo\Control;

use ImagickDemo\Control;

class ReactControls implements Control
{

    private $imageBaseURL = null;

    private $orignalImageBaseURL = null;

    private $customImageBaseURL = null;

    private $imageStatusBaseURL = null;

    private $taskQueue = null;

    public function __construct(
        \ImagickDemo\Helper\PageInfo $pageInfo,
        \ImagickDemo\Queue\ImagickTaskQueue $taskQueue
    ) {
        $activeCategory = $pageInfo->getCategory();
        $activeExample = $pageInfo->getExample();

        $this->imageBaseURL = \ImagickDemo\Route::getImageURL($activeCategory, $activeExample);
        $this->orignalImageBaseURL = \ImagickDemo\Route::getOriginalImageURL($activeCategory, $activeExample);
        $this->customImageBaseURL = \ImagickDemo\Route::getCustomImageURL($activeCategory, $activeExample);
        $this->imageStatusBaseURL = \ImagickDemo\Route::getImageStatusURL($activeCategory, $activeExample);
        $this->taskQueue = $taskQueue;

    }

    public function renderForm()
    {
        return "React form goes here.";
    }

    public function getParams()
    {
        // throw new \Exception("TODO: Implement getParams() method.");
        return [];
    }

    public function getInjectionParams()
    {
        return [];
    }

    public function getFullParams(array $extraParams = [])
    {
        $params = $this->getInjectionParams();
        $params += $extraParams;
        return $params;
    }

    public function getURL()
    {
        return $this->imageBaseURL;
    }

    public function getCustomImageURL(array $extraParams = [])
    {
        return $this->customImageBaseURL;
    }

    public function getImageStatusURL($extraParams = [])
    {
        return $this->imageStatusBaseURL;
    }

    public function renderImageURL($originalImageURL = null)
    {
        return \ImagickDemo\Route::renderImageURL(
            false, //$this->taskQueue->isActive(),
            $this->getURL(),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }

    public function renderCustomImageURL($extraParams, $originalImageURL = null)
    {
        return \ImagickDemo\Route::renderImageURL(
            false, //$this->taskQueue->isActive(),
            $this->getCustomImageURL($extraParams),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }
}