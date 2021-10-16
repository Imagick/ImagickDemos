<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BorderImageControl;

class borderImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Border image";
    }

    public static function getParamType(): string
    {
        return BorderImageControl::class;
    }
}
