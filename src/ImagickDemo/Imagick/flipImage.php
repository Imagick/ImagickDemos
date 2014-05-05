<?php

namespace ImagickDemo\Imagick;


class flipImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->flipImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}