<?php

namespace ImagickDemo\Imagick;

class roundCorners extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::roundCorners";
    }
    

    public function render()
    {
        return $this->renderImageURL();
    }
}
