<?php

namespace ImagickDemo\Imagick;


class cropImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/cropImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->cropImage(200, 200, 120, 50);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}