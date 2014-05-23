<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

    function renderTitle() {
        return "Adaptive blur image";
    }

    function render() {
        $output = "This is a description. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }
}