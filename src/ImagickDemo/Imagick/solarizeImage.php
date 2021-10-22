<?php

namespace ImagickDemo\Imagick;

class solarizeImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename(): string|null
    {
        return $this->control->getImagePath();
    }


}
