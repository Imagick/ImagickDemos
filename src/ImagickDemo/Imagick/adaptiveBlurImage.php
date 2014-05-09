<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\ExampleWithRadiusSigmaControlControl {


    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveBlurImage(4, 3);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}