<?php


namespace ImagickDemo\Imagick;


class swirlImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/swirlImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->swirlImage(-190);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }


}