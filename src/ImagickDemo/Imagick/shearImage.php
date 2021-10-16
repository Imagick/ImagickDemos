<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ShearImageControl;

class shearImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shearImage";
    }

    public static function getParamType(): string
    {
        return ShearImageControl::class;
    }
}
