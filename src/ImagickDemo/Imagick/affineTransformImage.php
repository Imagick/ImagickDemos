<?php

namespace ImagickDemo\Imagick;


class affineTransformImage extends \ImagickDemo\Example {

    function render() {
        $output = "This appears to not be working.<br/>";
        $output .= $this->renderImageURL();
        return $output;
    }
}