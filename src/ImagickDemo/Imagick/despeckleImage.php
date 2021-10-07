<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class despeckleImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Despeckle image";
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
