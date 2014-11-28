<?php

namespace ImagickDemo\Imagick;


class unsharpMaskImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}