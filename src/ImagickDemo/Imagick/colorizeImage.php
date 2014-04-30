<?php

namespace ImagickDemo\Imagick;


class colorizeImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/colorizeImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


//$clutImagick = new \Imagick(realpath("../images/TestImage4.gif"));

        $color = new \ImagickPixel("rgba(0, 255, 128, 0.15)");

        $opacity = new \ImagickPixel("rgba(0, 0, 0, 0.85)");

        $imagick->colorizeImage($color, $opacity);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}