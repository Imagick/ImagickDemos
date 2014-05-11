<?php

namespace ImagickDemo\Imagick;

class sigmoidalContrastImage extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        //Need some stereo image to work with.
        $imagick->sigmoidalcontrastimage(
            false, //sharpen 
            7,
            90
        );
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}