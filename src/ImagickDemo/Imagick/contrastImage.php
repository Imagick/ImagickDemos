<?php

namespace ImagickDemo\Imagick;


class contrastImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}