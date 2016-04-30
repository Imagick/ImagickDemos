<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }

    public function renderTitle()
    {
        return "Adaptive blur image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
