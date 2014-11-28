<?php

namespace ImagickDemo\Imagick;


class adaptiveThresholdImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}