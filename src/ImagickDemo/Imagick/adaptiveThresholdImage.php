<?php

namespace ImagickDemo\Imagick;


class adaptiveThresholdImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/adaptiveThresholdImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveThresholdImage(2, 2, 0.1);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}