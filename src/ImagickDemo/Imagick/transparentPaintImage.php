<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\TransparentPaintImageControl;

class transparentPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transparentPaintImage";
    }

    function getOriginalFilename(): string|null
    {
        return "/images/BlueScreen.jpg";
    }

    public static function getParamType(): string
    {
        return TransparentPaintImageControl::class;
    }
}
