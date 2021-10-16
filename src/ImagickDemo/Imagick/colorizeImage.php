<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ColorizeImageControl;

class colorizeImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Colorize image";
    }

    public static function getParamType(): string
    {
        return ColorizeImageControl::class;
    }
}
