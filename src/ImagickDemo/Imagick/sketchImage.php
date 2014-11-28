<?php

namespace ImagickDemo\Imagick;


class sketchImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}