<?php

namespace ImagickDemo\Imagick;

class remapImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }
    

    public function renderDescription()
    {
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
