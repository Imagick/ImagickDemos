<?php

namespace ImagickDemo\Imagick;


class rollImage extends \ImagickDemo\Example {

    function render() {
        return $this->renderImageURL();
    }

    function getOriginalImage() {
        return true;
    }
}