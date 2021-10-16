<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class transverseImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transverseImage";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
