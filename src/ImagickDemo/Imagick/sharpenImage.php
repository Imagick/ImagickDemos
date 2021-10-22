<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SharpenImageControl;

class sharpenImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sharpenImage";
    }

    public static function getParamType(): string
    {
        return SharpenImageControl::class;
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }
}
