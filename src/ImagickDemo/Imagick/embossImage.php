<?php

namespace ImagickDemo\Imagick;

class embossImage extends \ImagickDemo\Example {

    use OriginalImageFile;

//    function renderTitle() {
//        return "Adaptive blur image";
//    }

    function render() {
        return $this->renderImageURL();
    }
}