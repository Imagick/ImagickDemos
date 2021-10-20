<?php


namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class getPixelRegionIterator extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Get pixel region iterator";
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
