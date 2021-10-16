<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class smushImages extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::smushImages";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
