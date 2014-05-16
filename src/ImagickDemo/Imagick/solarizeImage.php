<?php

namespace ImagickDemo\Imagick;


class solarizeImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageSolarizeThreshold
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageSolarizeThreshold $control) {
        $this->control = $control;
    }
    
    function getControl() {
        return $this->control;
    }
    
    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));

        $solarizeThreshold = $this->control->getSolarizeThreshold();
        
        $imagick->solarizeImage($solarizeThreshold);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}