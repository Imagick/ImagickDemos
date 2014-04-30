<?php

namespace ImagickDemo\Imagick;


class trimImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/trimImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->trimImage(25);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}