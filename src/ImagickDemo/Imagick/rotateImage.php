<?php

namespace ImagickDemo\Imagick;


class rotateImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/rotateImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->rotateimage('rgb(128, 32, 32)', 15);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}