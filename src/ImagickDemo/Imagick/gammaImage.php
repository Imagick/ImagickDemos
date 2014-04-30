<?php

namespace ImagickDemo\Imagick;


class gammaImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/gammaImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->gammaImage(2.0);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
    
}