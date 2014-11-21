<?php


namespace ImagickDemo\Config;

use ImagickDemo\Config;


class Librato {

    private $libratoKey;
    private $libratorUsername;
    private $statsSourceName;
    private $initialised = false;
    
    /** @var APCCacheEnvReader  */
    private $envReader;
    
    public function __construct() {
        $this->envReader = new APCCacheEnvReader();
    }
    
    private function init() {
        if ($this->initialised == true) {
            return;
        }
        $this->libratoKey = $this->envReader->getValue(Config::IMAGICK_DEMOS_LIBRATO_KEY);
        $this->libratorUsername = $this->envReader->getValue(Config::IMAGICK_DEMOS_LIBRATO_USERNAME);
        $this->statsSourceName = $this->envReader->getValue(Config::IMAGICK_DEMOS_LIBRATO_STATS_SOURCE_NAME);
        $this->initialised = true;
    }
    
    public function getLibratoKey() {
        $this->init();
        return $this->libratoKey;
    }

    public function getLibratoUsername() {
        $this->init();
        return $this->libratorUsername;
    }
    
    public function getStatsSourceName() {
        $this->init();
        return $this->statsSourceName;
    }
}

