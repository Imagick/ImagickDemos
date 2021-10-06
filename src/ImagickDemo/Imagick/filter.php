<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class filter extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function renderTitle(): string
    {
        return "Filter";
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
