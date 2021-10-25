<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\SetImageMatteColorControl;

class setImageMatteColor extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageMatteColor";
    }

    public static function getParamType(): string
    {
        return SetImageMatteColorControl::class;
    }
}
