<?php

namespace ImagickDemo\Imagick;


class negateImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->negateImage(false, \Imagick::CHANNEL_RED);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}