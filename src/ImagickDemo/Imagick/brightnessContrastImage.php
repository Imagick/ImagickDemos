<?php

namespace ImagickDemo\Imagick;

class brightnessContrastImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
