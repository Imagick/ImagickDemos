<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BlackThresholdImageControl;

class blackThresholdImage extends \ImagickDemo\Example
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
        return BlackThresholdImageControl::class;
    }
}
