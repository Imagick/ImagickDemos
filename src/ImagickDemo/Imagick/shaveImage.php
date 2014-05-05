<?php

namespace ImagickDemo\Imagick;


class shaveImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->shaveImage(100, 50);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}