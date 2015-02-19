<?php


namespace ImagickDemo\Config;
use ImagickDemo\Config;


class Application {

    private $cacheImages;
    private $queueImages;
    
    private $init = false;
    
    function __construct() {
        $this->envReader = new APCCacheEnvReader();
    }

    /**
     * 
     */
    private function readValues() {
        if ($this->init == true) {
            return;
        }
        $this->cacheImages = $this->envReader->getValue(Config::IMAGICK_DEMOS_CACHE_IMAGES);
        $this->queueImages = $this->envReader->getValue(Config::IMAGICK_DEMOS_QUEUE_IMAGES);
        $this->init = true;
    }

    /**
     * @return mixed
     */
    public function getCacheImages() {
        return false;
//        $this->readValues();
//        return $this->cacheImages;
    }

    /**
     * @return mixed
     */
    public function getQueueImages() {
        $this->readValues();
        return $this->queueImages;
    }
}