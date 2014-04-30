<?php

namespace ImagickDemo\Imagick;


class flipImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/flipImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->flipImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}