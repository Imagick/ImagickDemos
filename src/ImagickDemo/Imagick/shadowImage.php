<?php

namespace ImagickDemo\Imagick;


class shadowImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/shadowImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->shadowImage(1, 1, 0, 0);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}