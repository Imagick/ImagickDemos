<?php


namespace ImagickDemo\Imagick;


class shearImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/shearImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->shearimage('rgb(128, 32, 32)', 15, 0);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}