<?php

namespace ImagickDemo\Imagick;

class separateImageChannel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::separateImageChannel";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
