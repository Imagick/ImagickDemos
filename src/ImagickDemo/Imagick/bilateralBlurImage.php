<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use \ImagickDemo\Imagick\Controls\BilateralBlurImageControl;

class bilateralBlurImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::bilateralBlurImageControl";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return BilateralBlurImageControl::class;
    }
}
