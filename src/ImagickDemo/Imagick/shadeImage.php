<?php

namespace ImagickDemo\Imagick;


class shadeImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/shadeImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->shadeImage(true, 45, 20);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}