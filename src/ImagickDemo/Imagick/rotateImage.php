<?php

namespace ImagickDemo\Imagick;


class rotateImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->rotateimage('rgb(128, 32, 32)', 15);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}