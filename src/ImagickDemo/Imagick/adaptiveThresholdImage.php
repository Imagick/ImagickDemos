<?php

namespace ImagickDemo\Imagick;

class adaptiveThresholdImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
