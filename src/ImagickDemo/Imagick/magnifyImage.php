<?php

namespace ImagickDemo\Imagick;


class magnifyImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/magnifyImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->magnifyImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}