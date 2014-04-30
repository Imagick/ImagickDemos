<?php

namespace ImagickDemo\Imagick;


class shaveImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/shaveImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->shaveImage(100, 50);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}