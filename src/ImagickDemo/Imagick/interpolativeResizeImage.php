<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\InterpolativeResizeImageControl;

class interpolativeResizeImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::interpolativeResizeImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return InterpolativeResizeImageControl::class;
    }
}
