<?php

namespace ImagickDemo\Imagick;

class textureImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::textureImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
