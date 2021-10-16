<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\NegateImageControl;

class negateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::negateImage";
    }

    public function getOriginalImage()
    {
        return true;
    }



    public static function getParamType(): string
    {
        return NegateImageControl::class;
    }
}
