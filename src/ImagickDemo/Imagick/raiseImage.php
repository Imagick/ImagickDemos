<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\RaiseImageControl;

class raiseImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::raiseImage";
    }

    public static function getParamType(): string
    {
        return RaiseImageControl::class;
    }
}
