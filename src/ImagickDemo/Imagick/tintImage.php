<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\TintImageControl;

class tintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::tintImage";
    }


    public static function getParamType(): string
    {
        return TintImageControl::class;
    }

}
