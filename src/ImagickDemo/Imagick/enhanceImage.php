<?php

namespace ImagickDemo\Imagick;


class enhanceImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->enhanceImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}