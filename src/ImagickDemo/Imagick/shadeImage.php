<?php

namespace ImagickDemo\Imagick;


class shadeImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}