<?php

namespace ImagickDemo\Imagick;


class trimImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->trimImage(25);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}