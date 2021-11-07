<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ComplexImagesControl;

class complexImages extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::complexImages";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ComplexImagesControl::class;
    }
}
