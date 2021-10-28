<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\SetImageChannelMaskControl;

class setImageChannelMask extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageChannelMask";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SetImageChannelMaskControl::class;
    }
}
