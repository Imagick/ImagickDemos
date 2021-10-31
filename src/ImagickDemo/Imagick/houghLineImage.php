<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\HoughLineImageControl;

class houghLineImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::houghLineImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return HoughLineImageControl::class;
    }
}
