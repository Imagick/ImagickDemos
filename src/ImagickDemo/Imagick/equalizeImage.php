<?php

namespace ImagickDemo\Imagick;


class equalizeImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}