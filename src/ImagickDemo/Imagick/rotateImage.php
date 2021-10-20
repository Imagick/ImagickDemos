<?php

namespace ImagickDemo\Imagick;

use \ImagickDemo\Imagick\Controls\RotateImageControl;

class rotateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rotateImage";
    }

    public static function getParamType(): string
    {
        return RotateImageControl::class;
    }
}
