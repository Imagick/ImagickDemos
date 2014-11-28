<?php

namespace ImagickDemo\Imagick;


class gammaImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }    
}