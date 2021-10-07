<?php

namespace ImagickDemo\Imagick;

class medianFilterImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Median filter image";
    }


    public function render()
    {
        return $this->renderImageURL();
    }
}
