<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SwirlImageWithMethodControl;

class swirlImageWithMethod extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::swirlImageWithMethod";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SwirlImageWithMethodControl::class;
    }
}
