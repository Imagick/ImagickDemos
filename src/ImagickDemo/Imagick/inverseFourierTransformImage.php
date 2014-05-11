<?php

namespace ImagickDemo\Imagick;


class inverseFourierTransformImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
//        $imagick->adaptiveBlurImage(4, 3);

        echo "The image has ".$imagick->getNumberImages();
        
//        header("Content-Type: image/jpg");
//        echo $imagick->getImageBlob();
    }
}