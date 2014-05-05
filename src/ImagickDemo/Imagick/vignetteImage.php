<?php

namespace ImagickDemo\Imagick;


class vignetteImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->vignetteImage(10, 155, 15, 5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}