<?php

namespace ImagickDemo\Imagick;

class resizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::resizeImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
