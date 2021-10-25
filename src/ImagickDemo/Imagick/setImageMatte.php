<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use \ImagickDemo\Imagick\Controls\SetImageMatteControl;

class setImageMatte extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageMatte";
    }

    public function renderDescription()
    {
        return "I have no idea what this is meant to do, or if the example code is even close to being appropriate.";
    }

    public static function getParamType(): string
    {
        return SetImageMatteControl::class;
    }
}
