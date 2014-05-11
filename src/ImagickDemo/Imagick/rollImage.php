<?php

namespace ImagickDemo\Imagick;


class rollImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->rollimage(180, 30);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}