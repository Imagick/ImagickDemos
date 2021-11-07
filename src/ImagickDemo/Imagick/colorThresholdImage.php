<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ColorThresholdImageControl;

class colorThresholdImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::colorThresholdImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ColorThresholdImageControl::class;
    }
}
