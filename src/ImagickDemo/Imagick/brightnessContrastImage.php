<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BrightnessContrastImageControl;

class brightnessContrastImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Brightness contrast image";
    }

//    function getOriginalImage()
//    {
//        return $this->control->getOriginalURL();
//    }
//
//    function getOriginalFilename()
//    {
//        return $this->control->getImagePath();
//    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return BrightnessContrastImageControl::class;
    }
}
