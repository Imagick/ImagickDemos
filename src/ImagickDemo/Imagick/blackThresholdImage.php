<?php

namespace ImagickDemo\Imagick;


class blackThresholdImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    function render() {
        return $this->renderImageURL();
    }
}