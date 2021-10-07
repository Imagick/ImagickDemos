<?php

namespace ImagickDemo\Imagick;

class implodeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Implode image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
