<?php

namespace ImagickDemo\Imagick;


class unsharpMaskImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/unsharpMaskImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->unsharpMaskImage(5, 1, 5, 1);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}