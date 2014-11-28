<?php

namespace ImagickDemo\Imagick;


class clutImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}