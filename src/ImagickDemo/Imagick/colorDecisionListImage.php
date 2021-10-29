<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class colorDecisionListImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::colorDecisionListImage";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
