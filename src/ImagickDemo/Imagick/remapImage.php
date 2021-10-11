<?php

namespace ImagickDemo\Imagick;

class remapImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::remapImage";
    }

    public function renderDescription()
    {
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
