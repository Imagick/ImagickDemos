<?php

namespace ImagickDemo\Imagick;


class modulateImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->modulateImage(128, 128, 128);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}