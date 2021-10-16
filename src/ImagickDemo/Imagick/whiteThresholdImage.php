<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\WhiteThresholdImageControl;

class whiteThresholdImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::whiteThresholdImage";
    }



    public static function getParamType(): string
    {
        return WhiteThresholdImageControl::class;
    }
}
