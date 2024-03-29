<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class enhanceImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Enhance image";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
