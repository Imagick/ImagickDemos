<?php

namespace ImagickDemo\Imagick;

class setCompressionQuality extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setCompressionQuality";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
