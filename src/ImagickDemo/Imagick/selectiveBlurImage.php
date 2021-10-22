<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SelectiveBlurImageControl;

class selectiveBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::selectiveBlurImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SelectiveBlurImageControl::class;
    }
}
