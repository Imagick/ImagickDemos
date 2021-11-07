<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\OrderedDitherImageControl;

class orderedDitherImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::orderedDitherImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return OrderedDitherImageControl::class;
    }
}
