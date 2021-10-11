<?php

namespace ImagickDemo\Imagick;

class thumbnailImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::thumbnailImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
