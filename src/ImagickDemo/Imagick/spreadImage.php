<?php

namespace ImagickDemo\Imagick;

class spreadImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::spreadImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
