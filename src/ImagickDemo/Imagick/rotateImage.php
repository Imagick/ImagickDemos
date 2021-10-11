<?php

namespace ImagickDemo\Imagick;

class rotateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rotateImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
