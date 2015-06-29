<?php

namespace ImagickDemo\Imagick;

class montageImage extends \ImagickDemo\Example {

    function renderTitle() {
        return "Montage image";
    }

    function render() {
        return $this->renderImageURL();
    }
}