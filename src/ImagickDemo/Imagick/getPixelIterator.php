<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class getPixelIterator extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Get pixel iterator";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
