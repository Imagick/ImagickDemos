<?php

namespace ImagickDemo\Imagick;

class tintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::tintImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
