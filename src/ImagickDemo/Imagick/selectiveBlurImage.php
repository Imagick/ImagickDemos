<?php

namespace ImagickDemo\Imagick;

class selectiveBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::selectiveBlurImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
