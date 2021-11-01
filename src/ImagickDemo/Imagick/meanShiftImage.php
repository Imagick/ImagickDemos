<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\MeanShiftImageControl;

class meanShiftImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::meanShiftImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return MeanShiftImageControl::class;
    }
}
