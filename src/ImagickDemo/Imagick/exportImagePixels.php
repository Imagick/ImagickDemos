<?php

namespace ImagickDemo\Imagick;

class exportImagePixels extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}