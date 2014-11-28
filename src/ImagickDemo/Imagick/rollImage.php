<?php

namespace ImagickDemo\Imagick;


class rollImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}