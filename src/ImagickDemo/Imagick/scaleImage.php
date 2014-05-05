<?php

namespace ImagickDemo\Imagick;


class scaleImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->scaleImage(150, 150, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}