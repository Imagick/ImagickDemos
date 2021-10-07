<?php

namespace ImagickDemo\Imagick;

class magnifyImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Magnify image";
    }


    public function render()
    {
        return $this->renderImageURL();
    }
}
