<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\NullControl;

class SetImageMask extends Example
{
    public function renderTitle(): string
    {
        return "Set image mask";
    }


    public static function getParamType(): string
    {
        return NullControl::class;
    }
}
