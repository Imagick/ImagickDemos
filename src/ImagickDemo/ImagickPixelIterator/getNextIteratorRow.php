<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Controls\ImageControl;

class getNextIteratorRow extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "get next iterator row";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
