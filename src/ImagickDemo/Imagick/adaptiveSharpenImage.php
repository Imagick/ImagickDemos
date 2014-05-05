<?php

namespace ImagickDemo\Imagick;


class adaptiveSharpenImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveSharpenImage(2, 20);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}