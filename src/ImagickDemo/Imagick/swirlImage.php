<?php


namespace ImagickDemo\Imagick;


class swirlImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}