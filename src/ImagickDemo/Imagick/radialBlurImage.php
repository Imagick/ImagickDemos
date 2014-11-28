<?php

namespace ImagickDemo\Imagick;


class radialBlurImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}