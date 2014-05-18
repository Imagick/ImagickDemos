<?php

namespace ImagickDemo\Imagick;

class medianFilterImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeRadiusSigmaImage
     */
    private $riControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeRadiusImage $riControl) {
        $this->riControl = $riControl;
    }

    function getControl() {
        return $this->riControl;
    }
    
    function renderDescription() {
    }

    function renderImage() {
        $radius = $this->riControl->getRadius();

        $imagick = new \Imagick(realpath($this->riControl->getImagePath()));
        @$imagick->medianFilterImage($radius);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}