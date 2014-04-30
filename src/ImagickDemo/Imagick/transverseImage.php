<?php

namespace ImagickDemo\Imagick;


class transverseImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/transverseImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->transverseImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}