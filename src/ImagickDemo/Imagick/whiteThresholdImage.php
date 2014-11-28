<?php

namespace ImagickDemo\Imagick;


class whiteThresholdImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}