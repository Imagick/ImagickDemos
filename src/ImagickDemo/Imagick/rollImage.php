<?php

namespace ImagickDemo\Imagick;

class rollImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rollImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
