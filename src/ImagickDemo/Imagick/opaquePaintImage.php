<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\OpaquePaintImageControl;

class opaquePaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::opaquePaintImage";
    }

    public function getOriginalFilename(): string|null
    {
        return "/images/BlueScreen.jpg";
    }

    public static function getParamType(): string
    {
        return OpaquePaintImageControl::class;
    }
}
