<?php

namespace ImagickDemo\Imagick;

class radialBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::radialBlurImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
