<?php

namespace ImagickDemo\Imagick;

class sketchImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }
    

    public function render()
    {
        return $this->renderImageURL();
    }
}
