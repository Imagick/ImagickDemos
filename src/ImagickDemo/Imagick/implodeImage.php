<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImplodeImageControl;

class implodeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Implode image";
    }

    public static function getParamType(): string
    {
        return ImplodeImageControl::class;
    }
}
