<?php

namespace ImagickDemo\Imagick;

class enhanceImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
