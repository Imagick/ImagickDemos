<?php

namespace ImagickDemo\Imagick;

class setImageClipMask extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageClipMask";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
