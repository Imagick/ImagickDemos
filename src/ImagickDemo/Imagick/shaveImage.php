<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class shaveImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shaveImage";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
