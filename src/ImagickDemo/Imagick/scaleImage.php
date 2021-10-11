<?php

namespace ImagickDemo\Imagick;

class scaleImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::scaleImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
