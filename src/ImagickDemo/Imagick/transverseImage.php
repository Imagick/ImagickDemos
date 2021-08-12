<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class transverseImage extends \ImagickDemo\Example
{
    public function render()
    {
        return $this->renderImageURL();
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
