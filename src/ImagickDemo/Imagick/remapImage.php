<?php

namespace ImagickDemo\Imagick;


class remapImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/remapImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {


        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));

        $imagick->remapImage($imagick2, true);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}