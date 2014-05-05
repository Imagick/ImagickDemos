<?php

namespace ImagickDemo\Imagick;


class solarizeImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->solarizeImage(0.0001);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}