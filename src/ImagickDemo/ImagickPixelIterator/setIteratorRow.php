<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Params\ImageControl;

class setIteratorRow extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
