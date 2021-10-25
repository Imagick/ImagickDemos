<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class thumbnailImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::thumbnailImage";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
