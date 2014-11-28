<?php

namespace ImagickDemo\Imagick;


class charcoalImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}