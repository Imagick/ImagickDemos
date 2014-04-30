<?php

namespace ImagickDemo\Imagick;


class chopImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/chopImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->chopImage(200, 200, 100, 100);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }

}