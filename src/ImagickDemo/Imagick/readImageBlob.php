<?php

namespace ImagickDemo\Imagick;

class readImageBlob extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::readImageBlob";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
