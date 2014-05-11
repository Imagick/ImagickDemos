<?php

namespace ImagickDemo\Imagick;


class reduceNoiseImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        @$imagick->reduceNoiseImage(5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}