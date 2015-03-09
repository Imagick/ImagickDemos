<?php

namespace ImagickDemo\Imagick;

class flattenImages extends \ImagickDemo\Example {

    function renderTitle() {
        return "Flatten images";
    }

    function render() {
        return $this->renderImageURL();
    }
}