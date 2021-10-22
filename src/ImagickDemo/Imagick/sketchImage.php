<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SketchImageControl;

class sketchImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sketchImage";
    }



    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SketchImageControl::class;
    }
}
