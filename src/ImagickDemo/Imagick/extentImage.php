<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class extentImage extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Extent image";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
