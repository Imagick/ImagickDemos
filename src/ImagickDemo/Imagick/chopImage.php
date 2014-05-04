<?php

namespace ImagickDemo\Imagick;


class chopImage extends ImagickExample {
    
    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->chopImage(200, 200, 100, 100);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }

}