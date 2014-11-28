<?php

namespace ImagickDemo\Imagick;


class despeckleImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}