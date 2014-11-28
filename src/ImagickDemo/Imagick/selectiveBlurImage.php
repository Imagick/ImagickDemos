<?php

namespace ImagickDemo\Imagick;

class selectiveBlurImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}