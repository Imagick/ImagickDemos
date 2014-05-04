<?php

namespace ImagickDemo\Imagick;


class adaptiveThresholdImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveThresholdImage(2, 2, 0.1);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}