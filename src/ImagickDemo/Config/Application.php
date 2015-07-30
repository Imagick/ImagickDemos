<?php

namespace ImagickDemo\Config;

use ImagickDemo\Config;

class Application
{
    private $cacheImages;
    private $queueImages;
    
    private $init = false;
    
    public function __construct()
    {
        $this->envReader = new APCCacheEnvReader();
    }

    /**
     *
     */
    private function readValues()
    {
        if ($this->init == true) {
            return;
        }
        
        $this->cacheImages = boolval($this->envReader->getValue(Config::IMAGES_CACHE));
        $this->queueImages = boolval($this->envReader->getValue(Config::IMAGES_QUEUE));
        $this->init = true;
    }

    /**
     * @return mixed
     */
    public function getCacheImages()
    {
        $this->readValues();
        return $this->cacheImages;
    }

    /**
     * @return mixed
     */
    public function getQueueImages()
    {
        $this->readValues();
        return $this->queueImages;
    }
}
