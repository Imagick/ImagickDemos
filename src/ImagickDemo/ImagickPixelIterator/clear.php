<?php


namespace ImagickDemo\ImagickPixelIterator;


class clear extends \ImagickDemo\Example {
    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
}