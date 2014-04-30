<?php



namespace ImagickDemo\Imagick;


class thumbnailImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/thumbnailImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        $imagick = new \Imagick(realpath($this->imagePath));

        $imagick->setbackgroundcolor('rgb(64, 64, 64)');

        $imagick->thumbnailImage(100, 100, true, true);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}