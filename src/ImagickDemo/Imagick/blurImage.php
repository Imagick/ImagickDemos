<?php

namespace ImagickDemo\Imagick;

class blurImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/blurImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->blurImage(5, 5);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }

}