<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AdaptiveThresholdImageControl;

class adaptiveThresholdImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Adaptive threshold image";
    }

    public static function getParamType(): string
    {
        return AdaptiveThresholdImageControl::class;
    }
}
