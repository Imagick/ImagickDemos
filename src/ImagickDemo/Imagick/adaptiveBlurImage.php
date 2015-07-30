<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function renderTitle()
    {
        return "Adaptive blur image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
