<?php

namespace ImagickDemo\ImagickPixel;

class setColor extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Set color";
    }


    public function render()
    {
        return "" . $this->renderImageURL();
    }
}
