<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\EdgeImageControl;

class edgeImage extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Edge image";
    }

    public static function getParamType(): string
    {
        return EdgeImageControl::class;
    }
}
