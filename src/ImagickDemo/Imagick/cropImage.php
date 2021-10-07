<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\CropImageControl;

class cropImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Crop image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public static function getParamType(): string
    {
        return CropImageControl::class;
    }
}
