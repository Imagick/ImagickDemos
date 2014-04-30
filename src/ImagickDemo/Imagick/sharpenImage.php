<?php

namespace ImagickDemo\Imagick;


class sharpenImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/sharpenImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->sharpenimage(3, 15);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}