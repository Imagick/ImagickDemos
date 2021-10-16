<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class filter extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Filter";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
