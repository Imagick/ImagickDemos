<?php

namespace ImagickDemo\Imagick;

class swirlImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::swirlImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
