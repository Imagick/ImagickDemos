<?php

namespace ImagickDemo\Imagick;


class adaptiveSharpenImage extends \ImagickDemo\Example {

    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeRadiusSigmaImage $control) {
        $this->control = $control;
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
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        $radius = $this->control->getRadius();
        $sigma = $this->control->getSigma();
        $imagick->adaptiveSharpenImage($radius, $sigma);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}