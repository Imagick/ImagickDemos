<?php

namespace ImagickDemo\Imagick;


class clipImage extends ImagickExample {


    function renderDescription() {
        return "Not working - needs a clip path defining.";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->clipImage();
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }

}