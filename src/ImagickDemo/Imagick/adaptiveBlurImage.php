<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

    function __construct(\ImagickDemo\Control\ImageControl $imageControl) {
        $this->imageControl = $imageControl;
    }

    function getParameters() {
        return $this->imageControl->getParams();
    }
    
    function renderImageURL() {
        $params = $this->imageControl->getParamString();

        return "<img src='/image/Imagick/adaptiveBlurImage?$params'/>";
    }
    
    function renderTitle() {
        return "Adaptive blur image";
    }

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $imagick->adaptiveBlurImage(4, 3);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}