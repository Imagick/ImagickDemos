<?php


namespace ImagickDemo\Control;

use ImagickDemo\Queue\ImagickTaskQueue;

use ImagickDemo\Helper\PageInfo;

class NullControl implements \ImagickDemo\Control {


    private $activeCategory;
    private $activeExample;
    
    function __construct(ImagickTaskQueue $taskQueue, PageInfo $pageInfo) {
        $activeCategory = $pageInfo->getCategory();
        $activeExample = $pageInfo->getExample();
    
        $this->taskQueue = $taskQueue;
        $this->activeCategory = $activeCategory;
        $this->activeExample = $activeExample;
    }

    /**
     * 
     */
    function renderForm() { }

    /**
     * @param null $originalImageURL
     * @return string
     */
    function renderImageURL($originalImageURL = null) {
        return renderImageURL(
            $this->taskQueue->isActive(),
            $this->getURL(),
            $originalImageURL,
            $this->getImageStatusURL(),
            $this->getURL()
        );
    }

    /**
     * @param $extraParams
     * @return string
     */
    function renderCustomImageURL($extraParams) {
        return renderImageURL(
            $this->taskQueue->isActive(),
            $this->getCustomImageURL($extraParams),
            false,
            $this->getImageStatusURL($extraParams)
        );
    }
    
    
    /**
     * @return array
     */
    function getParams() {
        return [];
    }

    function getInjectionParams() {
        return [];
    }
    

    function getFullParams(array $extraParams = []) {
        return $extraParams;
    }

    function getURL() {
        return getImageURL($this->activeCategory, $this->activeExample);
    }

    function getCustomImageURL(array $extraParams = array()) {
        $paramString = '';
        $separator = '?';

        foreach ($extraParams as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return getCustomImageURL($this->activeCategory, $this->activeExample).$paramString;
    }

    function getImageStatusURL($extraParams = []) {
        $path =  getImageStatusURL($this->activeCategory, $this->activeExample);

        return $path.'?'.http_build_query($extraParams);
    }
}

 