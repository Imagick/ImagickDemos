<?php

namespace ImagickDemo\Imagick;

class adaptiveSharpenImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
