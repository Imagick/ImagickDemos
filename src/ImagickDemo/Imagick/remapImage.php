<?php

namespace ImagickDemo\Imagick;


class remapImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function renderDescription() {
    }

    function render() {
        return $this->renderImageURL();
    }
}