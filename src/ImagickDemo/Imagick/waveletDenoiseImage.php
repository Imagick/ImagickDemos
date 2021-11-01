<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\WaveletDenoiseImageControl;

class waveletDenoiseImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::waveletDenoiseImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return WaveletDenoiseImageControl::class;
    }
}
