<?php

namespace ImagickDemo\Imagick;


class adaptiveThresholdImage extends  \ImagickDemo\Example {

    private $control;
    
    function __construct() {
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }


    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->imagePath));
        
        
        
        $imagick->adaptiveThresholdImage(2, 2, 0.1);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}