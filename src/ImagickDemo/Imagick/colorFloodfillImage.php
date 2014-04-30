<?php

namespace ImagickDemo\Imagick;


class colorFloodfillImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/colorFloodfillImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $draw = new \ImagickDraw();

        $border = new \ImagickPixel('red');
        $flood = new \ImagickPixel('rgb(128, 32, 128)');

        @$imagick->colorFloodfillImage($flood, 0, $border, 5, 5);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }

}