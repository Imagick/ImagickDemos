<?php

namespace ImagickDemo\Imagick;

class reduceNoiseImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::reduceNoiseImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
