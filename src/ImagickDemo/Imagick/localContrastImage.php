<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\LocalContrastImageControl;



class localContrastImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::localContrastImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return LocalContrastImageControl::class;
    }
}
