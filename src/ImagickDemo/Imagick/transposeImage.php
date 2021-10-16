<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class transposeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transposeImage";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
