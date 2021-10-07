<?php

namespace ImagickDemo\Imagick;

class modulateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Modulate image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
