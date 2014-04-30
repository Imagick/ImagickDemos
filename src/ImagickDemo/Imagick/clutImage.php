<?php

namespace ImagickDemo\Imagick;


class clutImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/clutImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


        $clutImagick = new \Imagick(realpath("../images/TestImage4.gif"));

        $imagick->clutImage($clutImagick);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();


    }
}