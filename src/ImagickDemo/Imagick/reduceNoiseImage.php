<?php

namespace ImagickDemo\Imagick;


class reduceNoiseImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}