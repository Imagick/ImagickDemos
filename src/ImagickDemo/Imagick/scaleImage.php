<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ScaleImageControl;

class scaleImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::scaleImage";
    }

    public static function getParamType(): string
    {
        return ScaleImageControl::class;
    }
}
