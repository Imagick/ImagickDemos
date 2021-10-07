<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class flopImage extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Flop image";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
