<?php

namespace ImagickDemo\Imagick;


class borderImage  extends ImagickExample  {


    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->borderImage('rgb(32, 32, 128)', 20, 20);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}