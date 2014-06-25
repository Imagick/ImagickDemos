<?php

namespace ImagickDemo\Imagick;

class sigmoidalContrastImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    function render() {
        return $this->renderImageURL();
    }
}