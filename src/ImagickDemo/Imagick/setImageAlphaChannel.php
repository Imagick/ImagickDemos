<?php

namespace ImagickDemo\Imagick;

class setImageAlphaChannel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageAlphaChannel";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
