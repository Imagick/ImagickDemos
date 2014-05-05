<?php

namespace ImagickDemo\Imagick;


class segmentImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->segmentImage(\Imagick::COLORSPACE_RGB, 10, 5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}