<?php

namespace ImagickDemo\Imagick;


class blackThresholdImage extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->blackthresholdimage('rgb(64, 64, 64)');
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}