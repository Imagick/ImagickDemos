<?php

namespace ImagickDemo\Imagick;

class colorizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
