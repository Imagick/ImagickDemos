<?php

namespace ImagickDemo\Imagick;


class transposeImage  extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->transposeImage();
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}