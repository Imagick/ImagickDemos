<?php

namespace ImagickDemo\Imagick;


class despeckleImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/despeckleImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


        $imagick->despeckleImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}