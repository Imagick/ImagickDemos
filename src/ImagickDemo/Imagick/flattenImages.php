<?php

namespace ImagickDemo\Imagick;

class flattenImages extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Flatten images";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
