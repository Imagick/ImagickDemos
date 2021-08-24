<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class affineTransformImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "TODO - write the description...<br/>";
    }



    public static function getParamType(): string
    {
        // TODO - this could do with more controls.
        return ImageControl::class;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
