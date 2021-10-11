<?php

namespace ImagickDemo\Imagick;

class shadowImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shadowImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
