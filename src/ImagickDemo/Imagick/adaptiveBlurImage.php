<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;

class adaptiveBlurImage extends Example
{


    public function renderTitle(): string
    {
        return "Adaptive blur image";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return AdaptiveBlurImageControl::class;
    }
}
