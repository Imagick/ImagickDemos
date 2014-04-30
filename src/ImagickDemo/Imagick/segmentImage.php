<?php

namespace ImagickDemo\Imagick;


class segmentImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/segmentImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick->segmentImage(\Imagick::COLORSPACE_RGB, 10, 5);


        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}