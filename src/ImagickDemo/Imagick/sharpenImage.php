<?php

namespace ImagickDemo\Imagick;

class sharpenImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
