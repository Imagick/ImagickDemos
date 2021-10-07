<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ConvolveImageControl;

class convolveImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Convolve image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return ConvolveImageControl::class;
    }
}
