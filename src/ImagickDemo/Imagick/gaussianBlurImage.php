<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageRadiusSigmaChannelControl;

class gaussianBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Gaussian image";
    }





    public static function getParamType(): string
    {
        return ImageRadiusSigmaChannelControl::class;
    }
}
