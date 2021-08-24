<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BorderImageControl;

class borderImage extends \ImagickDemo\Example
{
    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return BorderImageControl::class;
    }
}
