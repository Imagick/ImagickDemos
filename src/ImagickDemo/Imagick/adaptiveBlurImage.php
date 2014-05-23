<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

    function renderTitle() {
        return "Adaptive blur image";
    }

    function renderDescription() {
        return "This is a description. <br/>";
    }

    function render() {
        return $this->renderImageURL();
    }
}