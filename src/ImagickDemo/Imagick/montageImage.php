<?php

namespace ImagickDemo\Imagick;

class montageImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Montage image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
