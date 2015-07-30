<?php

namespace ImagickDemo\Imagick;

class radialBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
