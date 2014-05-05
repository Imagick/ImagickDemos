<?php

namespace ImagickDemo\Imagick;


class clutImage extends ImagickExample {


    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $clutImagick = new \Imagick(realpath("../images/TestImage4.gif"));
        $imagick->clutImage($clutImagick);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}