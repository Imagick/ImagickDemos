<?php

namespace ImagickDemo\Imagick;


class despeckleImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));


        $imagick->despeckleImage();

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}