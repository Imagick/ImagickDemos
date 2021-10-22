<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\RandomThresholdImageControl;

class randomThresholdImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::randomThresholdImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return RandomThresholdImageControl::class;
    }
}
