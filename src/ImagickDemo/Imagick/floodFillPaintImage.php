<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\FloodFillPaintImageControl;

class floodFillPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Flood fill paint image";
    }

    public function getOriginalFilename(): string|null
    {
        return "/images/BlueScreen.jpg";
    }

    public static function getParamType(): string
    {
        return FloodFillPaintImageControl::class;
    }
}
