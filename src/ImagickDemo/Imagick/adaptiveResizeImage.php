<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AdaptiveResizeImageControl;

class adaptiveResizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Adaptive resize image";
    }

    public static function getParamType(): string
    {
        return AdaptiveResizeImageControl::class;
    }
}
