<?php

namespace ImagickDemo\Imagick;


class borderImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/borderImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->borderImage('rgb(32, 32, 128)', 20, 20);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }

}