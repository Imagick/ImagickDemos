<?php

namespace ImagickDemo\Imagick;


class gaussianBlurImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/gaussianBlurImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->gaussianBlurImage(10, 6, \Imagick::CHANNEL_GREEN);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}