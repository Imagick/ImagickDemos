<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class smushImages extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::smushImages";
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
