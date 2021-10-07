<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class equalizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Equalize image";
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
