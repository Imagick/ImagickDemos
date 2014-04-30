<?php

namespace ImagickDemo\Imagick;


class magnifyImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/magnifyImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->magnifyImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}