<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BrightnessContrastImageControl;

class brightnessContrastImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Brightness contrast image";
    }

    public static function getParamType(): string
    {
        return BrightnessContrastImageControl::class;
    }
}
