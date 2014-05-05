<?php

namespace ImagickDemo\Imagick;


class colorizeImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {        
        $imagick = new \Imagick(realpath($this->imagePath));
        $color = new \ImagickPixel("rgba(0, 155, 128, 0.15)");
        $opacity = new \ImagickPixel("rgba(0, 0, 0, 0.65)");
        $imagick->colorizeImage($color, $opacity);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}