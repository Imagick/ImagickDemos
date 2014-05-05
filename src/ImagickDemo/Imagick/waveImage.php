<?php

namespace ImagickDemo\Imagick;


class waveImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->waveImage(4, 25);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}
