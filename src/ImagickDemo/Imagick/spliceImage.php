<?php

namespace ImagickDemo\Imagick;

class spliceImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::spliceImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
