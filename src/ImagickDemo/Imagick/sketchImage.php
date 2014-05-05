<?php

namespace ImagickDemo\Imagick;


class sketchImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->sketchimage(6, 15, 45);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}