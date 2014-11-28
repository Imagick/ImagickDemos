<?php

namespace ImagickDemo\Imagick;

class medianFilterImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}