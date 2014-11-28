<?php

namespace ImagickDemo\Imagick;


class annotateImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return  $this->renderImageURL();
    }
}