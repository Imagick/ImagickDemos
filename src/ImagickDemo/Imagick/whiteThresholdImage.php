<?php

namespace ImagickDemo\Imagick;


class whiteThresholdImage extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        //TODO needs a control
        $imagick->whiteThresholdImage('rgb(230, 230, 230)');
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}