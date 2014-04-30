<?php

namespace ImagickDemo\Imagick;


class transformImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/transformImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));
        $newImage = $imagick->transformimage("400x600", "200x300");
        header("Content-Type: image/jpg");
        echo $newImage->getImageBlob();
    }

}