<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class flipImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Flip image";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
