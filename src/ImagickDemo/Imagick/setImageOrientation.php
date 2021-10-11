<?php

namespace ImagickDemo\Imagick;

class setImageOrientation extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageOrientation";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
