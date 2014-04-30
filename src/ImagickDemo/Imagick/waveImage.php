<?php

namespace ImagickDemo\Imagick;


class waveImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/waveImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->waveImage(4, 25);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}
