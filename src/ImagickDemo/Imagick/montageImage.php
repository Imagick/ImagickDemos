<?php

namespace ImagickDemo\Imagick;

class montageImage extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Montage image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
