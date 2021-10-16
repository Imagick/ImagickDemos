<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\RollImageControl;

class rollImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rollImage";
    }

    public static function getParamType(): string
    {
        return RollImageControl::class;
    }
}
