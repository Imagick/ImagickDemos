<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class transverseImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transverseImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
