<?php


namespace ImagickDemo\Imagick;


class newPseudoImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/newPseudoImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(200, 200, 'gradient:');

        $imagick->sigmoidalcontrastimage(true, 14, 90);


        $imagick->setImageFormat("jpg");

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}
