<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\UnsharpMaskImageControl;

class unsharpMaskImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::unsharpMaskImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public static function getParamType(): string
    {
        return UnsharpMaskImageControl::class;
    }
}
