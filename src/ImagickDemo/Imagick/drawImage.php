<?php

namespace ImagickDemo\Imagick;

class drawImage extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Draw image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
