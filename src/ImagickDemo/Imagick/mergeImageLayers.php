<?php

namespace ImagickDemo\Imagick;

class mergeImageLayers extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Merge image layers";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
