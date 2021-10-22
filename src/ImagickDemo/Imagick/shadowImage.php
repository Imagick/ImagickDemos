<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ShadowImageControl;

class shadowImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shadowImage";
    }

    public static function getParamType(): string
    {
        return ShadowImageControl::class;
    }
}
