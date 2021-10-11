<?php

namespace ImagickDemo\Imagick;

class sigmoidalContrastImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sigmoidalContrastImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
