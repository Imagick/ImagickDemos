<?php

namespace ImagickDemo\Imagick;


class floodFillPaintImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return '/images/BlueScreen.jpg';
    }
    
    function render() {
        return $this->renderImageURL();
    }
}