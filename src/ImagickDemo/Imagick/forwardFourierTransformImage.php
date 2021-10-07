<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class forwardFourierTransformImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Forward fourier transform image";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
