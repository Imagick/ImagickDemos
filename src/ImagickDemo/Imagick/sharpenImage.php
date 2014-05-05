<?php

namespace ImagickDemo\Imagick;


class sharpenImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->sharpenimage(3, 15);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}