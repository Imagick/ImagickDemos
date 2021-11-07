<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\LevelImageColorsControl;

class levelImageColors extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::levelImageColors";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return LevelImageColorsControl::class;
    }
}
