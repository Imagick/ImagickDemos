<?php

namespace ImagickDemo\Imagick;

class stereoImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::stereoImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
