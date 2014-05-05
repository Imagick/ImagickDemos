<?php

namespace ImagickDemo\Imagick;


class radialBlurImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->radialBlurImage(10);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}