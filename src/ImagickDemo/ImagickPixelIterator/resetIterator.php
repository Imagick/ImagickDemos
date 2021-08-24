<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Controls\ImageControl;

class resetIterator extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "Reset a pixel iterator so that you can iterate over it again. <br/>";
        $output .= $this->renderImageURL();

        return $output;
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
