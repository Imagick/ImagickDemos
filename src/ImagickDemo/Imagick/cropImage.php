<?php

namespace ImagickDemo\Imagick;


class cropImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->cropImage(200, 200, 120, 50);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}