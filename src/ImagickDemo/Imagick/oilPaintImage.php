<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\OilPaintImageControl;

class oilPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::oilPaintImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return OilPaintImageControl::class;
    }
}
