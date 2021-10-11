<?php

namespace ImagickDemo\Imagick;

class shaveImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shaveImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
