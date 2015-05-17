<?php

namespace ImagickDemo\Imagick;


class mosaicImages extends \ImagickDemo\Example {

    function render() {
//        Inlays an image sequence to form a single coherent picture. It returns a wand with each image in the sequence composited at the location defined by the page offset of the image.

        return $this->renderImageURL();
    }
}