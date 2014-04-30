<?php

namespace ImagickDemo\Imagick;


class vignetteImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/vignetteImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->vignetteImage(10, 155, 15, 5);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}