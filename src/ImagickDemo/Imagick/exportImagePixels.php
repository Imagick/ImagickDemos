<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class exportImagePixels extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Export image pixels";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
