<?php

namespace ImagickDemo\Imagick;


class randomThresholdImage extends \ImagickDemo\Example {

    private $control;

    function __construct(\ImagickDemo\Control\ImageControl $control) {
        $this->control = $control;
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        
        $imagick->randomThresholdimage(
            0.2 * \Imagick::getQuantum(),
            0.9 * \Imagick::getQuantum()
        );
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}