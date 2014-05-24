<?php

namespace ImagickDemo\ImagickPixelIterator;


class syncIterator extends \ImagickDemo\Example {

    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
}