<?php

namespace ImagickDemo\ImagickPixelIterator;

class construct extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
}
