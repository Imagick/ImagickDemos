<?php

namespace ImagickDemo\Imagick;


class unsharpMaskImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel $control) {
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
        $amount = $this->control->getAmount();
        $unsharpThresholdImage = $this->control->getUnsharpThreshold();

        $imagick->unsharpMaskImage($radius, $sigma, $amount, $unsharpThresholdImage);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}