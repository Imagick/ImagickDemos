<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\RangeThresholdImageControl;

class rangeThresholdImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::rangeThresholdImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderDescription()
    {
        return "Some colours go black...others go white, some remain the same.";
    }

    public static function getParamType(): string
    {
        return RangeThresholdImageControl::class;
    }
}
