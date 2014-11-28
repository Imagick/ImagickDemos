<?php

namespace ImagickDemo\Imagick;

class statisticImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}