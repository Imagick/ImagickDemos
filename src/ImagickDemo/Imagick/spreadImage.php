<?php
namespace ImagickDemo\Imagick;


class spreadImage  extends ImagickExample  {

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->spreadImage(5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}