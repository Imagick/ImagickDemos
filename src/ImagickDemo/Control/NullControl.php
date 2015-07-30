<?php

namespace ImagickDemo\Control;

use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Helper\PageInfo;

class NullControl implements \ImagickDemo\Control
{

    private $activeCategory;
    private $activeExample;
    
    public function __construct(ImagickTaskQueue $taskQueue, PageInfo $pageInfo)
    {
        $activeCategory = $pageInfo->getCategory();
        $activeExample = $pageInfo->getExample();
    
        $this->taskQueue = $taskQueue;
        $this->activeCategory = $activeCategory;
        $this->activeExample = $activeExample;
    }

    /**
     *
     */
    public function renderForm()
    {
    }

    /**
     * @param null $originalImageURL
     * @return string
     */
    public function renderImageURL($originalImageURL = null)
    {
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
    public function renderCustomImageURL($extraParams)
    {
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
    public function getParams()
    {
        return [];
    }

    public function getInjectionParams()
    {
        return [];
    }
    
    public function getFullParams(array $extraParams = [])
    {
        return $extraParams;
    }

    public function getURL()
    {
        return getImageURL($this->activeCategory, $this->activeExample);
    }

    public function getCustomImageURL(array $extraParams = array())
    {
        $paramString = '';
        $separator = '?';

        foreach ($extraParams as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return getCustomImageURL($this->activeCategory, $this->activeExample).$paramString;
    }

    public function getImageStatusURL($extraParams = [])
    {
        $path =  getImageStatusURL($this->activeCategory, $this->activeExample);

        return $path.'?'.http_build_query($extraParams);
    }
}
