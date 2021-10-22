<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SpreadImageControl;

class spreadImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::spreadImage";
    }

    public static function getParamType(): string
    {
        return SpreadImageControl::class;
    }
}
