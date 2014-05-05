<?php

namespace ImagickDemo\Imagick;


class gammaImage extends ImagickExample {

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->gammaImage(2.0);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
    
}