<?php

namespace ImagickDemo\Imagick;

class exportImagePixels extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
