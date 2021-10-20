<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SeparateImageChannelControl;

class separateImageChannel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::separateImageChannel";
    }

    public function hasOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SeparateImageChannelControl::class;
    }
}
