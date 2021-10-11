<?php

namespace ImagickDemo\Imagick;

class sketchImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sketchImage";
    }
    

    public function render()
    {
        return $this->renderImageURL();
    }
}
