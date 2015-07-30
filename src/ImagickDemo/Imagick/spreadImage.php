<?php

namespace ImagickDemo\Imagick;

class spreadImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
