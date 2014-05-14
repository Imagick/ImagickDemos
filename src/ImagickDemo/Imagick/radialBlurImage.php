<?php

namespace ImagickDemo\Imagick;


class radialBlurImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->radialBlurImage(3);
        $imagick->radialBlurImage(5);
        $imagick->radialBlurImage(7);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}