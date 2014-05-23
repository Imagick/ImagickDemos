<?php

namespace ImagickDemo\Imagick;


class deskewImage extends  \ImagickDemo\Example {

    function render() {
        $output = "Hint - look at the left edge of the left column. In the deskewed image it is vertical.";
        $output .= $this->renderImageURL();

        return $output;
    }
}