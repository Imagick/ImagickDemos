<?php

namespace ImagickDemo\Imagick;


class motionBlurImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/motionBlurImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));


        $imagick->motionBlurImage(20.0, 50.0, 45);


        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}