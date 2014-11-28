<?php

namespace ImagickDemo\Imagick;


class negateImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}