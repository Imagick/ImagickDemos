<?php

namespace ImagickDemo\Imagick;

class polaroidImage extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Polaroid image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
