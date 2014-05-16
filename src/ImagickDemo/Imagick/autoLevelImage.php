<?php

namespace ImagickDemo\Imagick;

class autoLevelImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $imageControl;
    
    function __construct(\ImagickDemo\Control\ImageControl $control) {
        $this->imageControl = $control;
    }

    function getControl() {
        return $this->imageControl;
    }
    
    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $imagick->autoLevelImage();
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}