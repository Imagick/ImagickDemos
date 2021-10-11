<?php

namespace ImagickDemo\Imagick;

class smushImages extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::smushImages";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
