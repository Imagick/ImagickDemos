<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;

class adaptiveSharpenImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Adaptive sharpen image";
    }

    public static function getParamType(): string
    {
        return AdaptiveBlurImageControl::class;
    }
}
