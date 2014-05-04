<?php

namespace ImagickDemo\Imagick;


class adaptiveResizeImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveResizeImage(200, 200, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}