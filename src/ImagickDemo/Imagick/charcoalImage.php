<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\CharcoalImageControl;

class charcoalImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Charcoal image";
    }

    public static function getParamType(): string
    {
        return CharcoalImageControl::class;
    }
}
