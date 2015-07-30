<?php

namespace ImagickDemo\Imagick;

class modulateImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
