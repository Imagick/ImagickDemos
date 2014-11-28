<?php

namespace ImagickDemo\Imagick;


class solarizeImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}