<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\PolaroidWithTextAndMethodControl;

class polaroidWithTextAndMethod extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Polaroid image with text and method";
    }

    public static function getParamType(): string
    {
        return PolaroidWithTextAndMethodControl::class;
    }
}
