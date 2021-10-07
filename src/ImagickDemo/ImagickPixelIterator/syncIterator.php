<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Controls\ImageControl;

class syncIterator extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Sync iterator";
    }


    public function render()
    {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
