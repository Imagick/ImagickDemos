<?php


namespace ImagickDemo\Imagick;


class tintImage  extends ImagickExample {

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->tintImage('rgb(0, 128, 255)', 1);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}