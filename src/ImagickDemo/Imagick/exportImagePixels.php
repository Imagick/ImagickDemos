<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class exportImagePixels extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Export image pixels";
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
