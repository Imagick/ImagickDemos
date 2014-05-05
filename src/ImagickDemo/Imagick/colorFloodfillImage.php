<?php

namespace ImagickDemo\Imagick;


class colorFloodfillImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $border = new \ImagickPixel('red');
        $flood = new \ImagickPixel('rgb(128, 32, 128)');
        @$imagick->colorFloodfillImage($flood, 0, $border, 5, 5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}