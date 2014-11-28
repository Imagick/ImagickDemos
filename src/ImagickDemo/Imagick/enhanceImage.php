<?php

namespace ImagickDemo\Imagick;


class enhanceImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}