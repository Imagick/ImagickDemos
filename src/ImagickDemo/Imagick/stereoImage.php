<?php


namespace ImagickDemo\Imagick;


class stereoImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/stereoImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

//Need some stereo image to work with.
//$imagick->stereoImage(true, 45, 20);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}