<?php

namespace ImagickDemo\Imagick;

class sketchImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
