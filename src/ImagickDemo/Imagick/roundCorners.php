<?php

namespace ImagickDemo\Imagick;


class roundCorners extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    function render() {
        return $this->renderImageURL();
    }
}