<?php

namespace ImagickDemo\Imagick;


class waveImage extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}
