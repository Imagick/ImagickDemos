<?php

namespace ImagickDemo\Imagick;


class normalizeImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/normalizeImage'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/LowContrast.jpg"));

        $original = clone $imagick;
        $original->cropimage($original->getImageWidth() / 2, $original->getImageHeight(), 0, 0);
        $imagick->normalizeImage(\Imagick::CHANNEL_ALL);
        $imagick->compositeimage($original, \Imagick::COMPOSITE_ATOP, 0, 0);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}