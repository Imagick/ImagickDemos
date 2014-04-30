<?php

namespace ImagickDemo\Imagick;


class negateImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/negateImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->negateImage(false, \Imagick::CHANNEL_RED);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}