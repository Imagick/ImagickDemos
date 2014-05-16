<?php

namespace ImagickDemo\Imagick;


class addNoiseImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY
     */
    private $control;

    function __construct(\ImagickDemo\Control\ControlCompositeImageNoise $control) {
        $this->control = $control;
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }


    function renderDescription() {
        return "NOISE_UNIFORM = 1;
        NOISE_GAUSSIAN = 2;
        NOISE_MULTIPLICATIVEGAUSSIAN = 3;
        NOISE_IMPULSE = 4;
        NOISE_LAPLACIAN = 5;
        NOISE_POISSON = 6;
        NOISE_RANDOM = 7; ";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        $noiseType = $this->control->getNoiseType();
        $imagick->addNoiseImage($noiseType);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}