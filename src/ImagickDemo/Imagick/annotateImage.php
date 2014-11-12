<?php

namespace ImagickDemo\Imagick;


class annotateImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    function render() {
        return  $this->renderImageURL();
    }
}