<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ClaheImageControl;

class claheImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::claheImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ClaheImageControl::class;
    }
}
