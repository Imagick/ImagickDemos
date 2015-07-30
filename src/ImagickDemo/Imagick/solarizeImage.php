<?php

namespace ImagickDemo\Imagick;

class solarizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
