<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ColorizeImageControl;

class colorizeImage extends \ImagickDemo\Example
{
    public function hasOriginalImage()
    {
        return true;
    }

    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return ColorizeImageControl::class;
    }
}
