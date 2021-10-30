<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ClampImageControl;

class clampImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::clampImage";
    }

    public function renderDescription()
    {
        return "ClampImage() restricts the color range from 0 to the quantum depth. aka I have no idea";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ClampImageControl::class;
    }
}
