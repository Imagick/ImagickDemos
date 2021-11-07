<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\LevelizeImageControl;

class levelizeImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::levelizeImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return LevelizeImageControl::class;
    }
}
