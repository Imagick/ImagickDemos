<?php

namespace ImagickDemo\Imagick;

class oilPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::oilPaintImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
