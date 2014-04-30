<?php

namespace ImagickDemo\Imagick;


class modulateImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/modulateImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->modulateImage(128, 128, 128);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}