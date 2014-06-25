<?php

namespace ImagickDemo\Imagick;


class vignetteImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }
    
    function render() {
        return $this->renderImageURL();
    }
}