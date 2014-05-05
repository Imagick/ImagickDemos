<?php

namespace ImagickDemo\Imagick;


class remapImage extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));
        $imagick->remapImage($imagick2, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}