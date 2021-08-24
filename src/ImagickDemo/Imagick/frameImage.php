<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\FrameImageControl;

class frameImage extends \ImagickDemo\Example
{
    public function render()
    {
        return $this->renderImageURL();
    }




    public static function getParamType(): string
    {
        return FrameImageControl::class;
    }
}
