<?php

namespace ImagickDemo\Imagick;


class adaptiveSharpenImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/adaptiveSharpenImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


        $imagick->adaptiveSharpenImage(2, 20);


        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}