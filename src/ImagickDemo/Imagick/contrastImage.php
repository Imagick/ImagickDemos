<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ContrastImageControl;

class contrastImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Contrast image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return ContrastImageControl::class;
    }
}
