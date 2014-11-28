<?php

namespace ImagickDemo\Imagick;

class blurImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }

}