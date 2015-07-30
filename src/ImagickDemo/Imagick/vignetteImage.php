<?php

namespace ImagickDemo\Imagick;

class vignetteImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
