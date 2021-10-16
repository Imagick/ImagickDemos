<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\FrameImageControl;

class frameImage extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Frame image";
    }



    public static function getParamType(): string
    {
        return FrameImageControl::class;
    }
}
