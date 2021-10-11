<?php

namespace ImagickDemo\Imagick;

class shadeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::shadeImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
