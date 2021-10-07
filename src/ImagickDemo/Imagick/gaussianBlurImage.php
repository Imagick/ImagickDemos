<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageRadiusSigmaChannelControl;

class gaussianBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Gaussian image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return ImageRadiusSigmaChannelControl::class;
    }
}
