<?php

namespace ImagickDemo\Imagick;

class recolorImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::recolorImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
