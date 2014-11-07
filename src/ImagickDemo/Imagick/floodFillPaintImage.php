<?php

namespace ImagickDemo\Imagick;


class floodFillPaintImage extends \ImagickDemo\Example {

    function getOriginalImage() {

        return '/images/BlueScreen.jpg';
        
//        return $this->control->getURL().'&original=true';
    }
    
    function render() {
        return $this->renderImageURL();
    }
}