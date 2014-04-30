<?php

namespace ImagickDemo\Imagick;


class sepiaToneImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/sepiaToneImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->sepiaToneImage(55);


        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}