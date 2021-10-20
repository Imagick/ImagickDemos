<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class polaroidImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Polaroid image";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
