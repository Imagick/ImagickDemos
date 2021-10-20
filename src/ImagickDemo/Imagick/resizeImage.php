<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ResizeImageControl;

class resizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::resizeImage";
    }


    public static function getParamType(): string
    {
        return ResizeImageControl::class;
    }
}
