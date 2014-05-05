<?php

namespace ImagickDemo\Imagick;


class oilPaintImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->oilPaintImage(4.0);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}