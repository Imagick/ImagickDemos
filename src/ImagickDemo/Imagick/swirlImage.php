<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SwirlImageControl;

class swirlImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::swirlImage";
    }

    public static function getParamType(): string
    {
        return SwirlImageControl::class;
    }
}
