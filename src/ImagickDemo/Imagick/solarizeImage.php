<?php

namespace ImagickDemo\Imagick;


class solarizeImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/solarizeImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->solarizeImage(0.0001);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}