<?php

namespace ImagickDemo\Imagick;


class thresholdImage extends  \ImagickDemo\Example {

    function render() {
        $output = "Convert an image into a black and white image with all pixels above the threshold converted to white, those below to black.";
        $output .= $this->renderImageURL();
        return $output;
    }
}