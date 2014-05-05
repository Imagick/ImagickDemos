<?php

namespace ImagickDemo\Imagick;

class stereoImage extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
//Need some stereo image to work with.
//$imagick->stereoImage(true, 45, 20);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}