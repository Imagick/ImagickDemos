<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\RemapImageControl;

class remapImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::remapImage";
    }

    public function renderDescription()
    {
    }

    public static function getParamType(): string
    {
        return RemapImageControl::class;
    }
}
