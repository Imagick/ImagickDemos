<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class autoGammaImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Imagick::autoGammaImage";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
