<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SpliceImageControl;

class spliceImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::spliceImage";
    }


    public static function getParamType(): string
    {
        return SpliceImageControl::class;
    }
}
