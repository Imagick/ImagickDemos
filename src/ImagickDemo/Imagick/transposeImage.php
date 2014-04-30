<?php

namespace ImagickDemo\Imagick;


class transposeImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/transposeImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->transposeImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}