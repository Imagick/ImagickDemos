<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\CannyEdgeImageControl;

class cannyEdgeImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::cannyEdgeImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return CannyEdgeImageControl::class;
    }
}
