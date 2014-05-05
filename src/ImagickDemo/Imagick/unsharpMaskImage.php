<?php

namespace ImagickDemo\Imagick;


class unsharpMaskImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->unsharpMaskImage(5, 1, 5, 1);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}