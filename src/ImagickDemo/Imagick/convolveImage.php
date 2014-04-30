<?php

namespace ImagickDemo\Imagick;


class convolveImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/convolveImage'/>";
    }

    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];

        $imagick->convolveImage($edgeFindingKernel);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}