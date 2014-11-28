<?php

namespace ImagickDemo\Imagick;


class modulateImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}