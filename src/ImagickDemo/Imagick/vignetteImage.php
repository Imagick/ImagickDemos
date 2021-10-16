<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\VignetteImageControl;

class vignetteImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::vignetteImage";
    }





    public static function getParamType(): string
    {
        return VignetteImageControl::class;
    }
}
