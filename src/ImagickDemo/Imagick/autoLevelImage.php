<?php

namespace ImagickDemo\Imagick;

class autoLevelImage extends \ImagickDemo\Example {

    use OriginalImageFile;

    function render() {
        return $this->renderImageURL();
    }
}