<?php

namespace ImagickDemo\Imagick;


class gaussianBlurImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}