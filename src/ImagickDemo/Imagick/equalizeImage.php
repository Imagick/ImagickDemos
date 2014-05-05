<?php

namespace ImagickDemo\Imagick;


class equalizeImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->equalizeImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}