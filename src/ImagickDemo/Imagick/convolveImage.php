<?php

namespace ImagickDemo\Imagick;

class convolveImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
