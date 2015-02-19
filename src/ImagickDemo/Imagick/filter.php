<?php

namespace ImagickDemo\Imagick;

class filter extends \ImagickDemo\Example {

    use OriginalImageFile;

    function renderTitle() {
        return "Filter";
    }

    function render() {
        return $this->renderImageURL();
    }
}