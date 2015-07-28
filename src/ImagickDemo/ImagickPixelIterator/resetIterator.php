<?php

namespace ImagickDemo\ImagickPixelIterator;

class resetIterator extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "Reset a pixel iterator so that you can iterate over it again. <br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
}
