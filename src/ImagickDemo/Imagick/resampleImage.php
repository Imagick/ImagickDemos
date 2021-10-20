<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class resampleImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::resampleImage";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
