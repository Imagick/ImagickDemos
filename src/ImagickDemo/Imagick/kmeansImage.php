<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use \ImagickDemo\Imagick\Controls\KmeansImageControl;

class kmeansImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::kmeansImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return KmeansImageControl::class;
    }
}
