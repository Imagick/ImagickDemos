<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\VignetteImageControl;

class vignetteImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::vignetteImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return VignetteImageControl::class;
    }
}
