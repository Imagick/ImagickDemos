<?php

namespace ImagickDemo\Imagick;


class normalizeImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }
    
    function render() {
        $output = "Original on left side, normalised on right. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }


}