<?php

namespace ImagickDemo\Imagick;


class motionBlurImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}