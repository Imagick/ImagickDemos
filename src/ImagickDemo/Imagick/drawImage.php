<?php

namespace ImagickDemo\Imagick;

class drawImage extends \ImagickDemo\Example {

    function renderTitle() {
        return "Draw image";
    }

    function render() {
        return $this->renderImageURL();
    }
}