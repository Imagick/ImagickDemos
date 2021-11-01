<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\AutoThresholdImageControl;

class autoThresholdImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::autoThresholdImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return AutoThresholdImageControl::class;
    }
}
