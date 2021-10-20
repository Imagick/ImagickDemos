<?php

namespace ImagickDemo\Imagick;

use \ImagickDemo\Imagick\Controls\SepiaImageControl;

class sepiaToneImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sepiaToneImage";
    }

    public static function getParamType(): string
    {
        return SepiaImageControl::class;
    }
}
