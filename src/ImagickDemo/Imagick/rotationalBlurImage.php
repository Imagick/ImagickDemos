<?php

namespace ImagickDemo\Imagick;

class rotationalBlurImage extends ImagickExample {

    function renderDescription() {
        return "I have no idea how this is different from radialBlurImage. radialBlur is deprecated in ImageMagick";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->rotationalBlurImage(3);
        $imagick->rotationalBlurImage(5);
        $imagick->rotationalBlurImage(7);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}