<?php

namespace ImagickDemo\Imagick;


class thresholdImage extends \ImagickDemo\Example {

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
        return "Convert an image into a black and white image with all pixels above the threshold converted to white, those below to black.";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        $imagick->thresholdimage(0.5 * \Imagick::getQuantum());
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}