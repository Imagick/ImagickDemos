<?php

namespace ImagickDemo\Imagick;

class colorFloodfillImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Color flood fill image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
