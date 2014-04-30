<?php

namespace ImagickDemo\Imagick;


class oilPaintImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/oilPaintImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


        $imagick->oilPaintImage(4.0);


        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}