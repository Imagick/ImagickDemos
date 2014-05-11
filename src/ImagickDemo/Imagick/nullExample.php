<?php

namespace ImagickDemo\Imagick;

class nullExample extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}