<?php

namespace ImagickDemo\Imagick;

class polaroidImage extends \ImagickDemo\Example {

    function renderTitle() {
        return "Polaroid image";
    }

    function render() {
        return $this->renderImageURL();
    }
}