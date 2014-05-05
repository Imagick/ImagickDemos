<?php

namespace ImagickDemo\Imagick;


class charcoalImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->charcoalImage(4, 4);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}