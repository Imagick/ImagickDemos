<?php

namespace ImagickDemo\Imagick;

class motionBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
