<?php

namespace ImagickDemo\Imagick;


class shadeImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->shadeImage(true, 45, 20);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}