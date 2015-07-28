<?php

namespace ImagickDemo\ImagickPixelIterator;

class syncIterator extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
}
