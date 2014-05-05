<?php

namespace ImagickDemo\Imagick;


class gaussianBlurImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->gaussianBlurImage(10, 6, \Imagick::CHANNEL_GREEN);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}