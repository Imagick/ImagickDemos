<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SetImagePixelControl;

class setImagePixelColor extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImagePixelColor";
    }

    public static function getParamType(): string
    {
        return SetImagePixelControl::class;
    }
}
