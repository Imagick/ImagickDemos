<?php

namespace ImagickDemo\Imagick;

class shearImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shearImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
