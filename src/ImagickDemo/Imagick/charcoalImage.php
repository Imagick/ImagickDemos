<?php

namespace ImagickDemo\Imagick;


class charcoalImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/charcoalImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->charcoalImage(4, 4);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}