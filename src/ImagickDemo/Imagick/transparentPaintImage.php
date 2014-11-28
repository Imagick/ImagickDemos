<?php

namespace ImagickDemo\Imagick;


class transparentPaintImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}