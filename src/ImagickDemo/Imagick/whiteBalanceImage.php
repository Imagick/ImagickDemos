<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ImageControl;

class whiteBalanceImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::whiteBalanceImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
