<?php

namespace ImagickDemo\Imagick;


class adaptiveSharpenImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }   
}