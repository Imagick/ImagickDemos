<?php

namespace ImagickDemo\Imagick;


class sharpenImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}