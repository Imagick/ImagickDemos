<?php

namespace ImagickDemo\Imagick;


class sketchImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/sketchImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->sketchimage(6, 15, 45);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}