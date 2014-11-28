<?php

namespace ImagickDemo\Imagick;


class vignetteImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}