<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageRadiusSigmaControl;

class embossImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Emboss image";
    }

    public static function getParamType(): string
    {
        return ImageRadiusSigmaControl::class;
    }
}
