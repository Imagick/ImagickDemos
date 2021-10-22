<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\MotionBlurImageControl;

class motionBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::motionBlurImage";
    }

    public function getOriginalImage()
    {
        return true;
    }


    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return MotionBlurImageControl::class;
    }
}
