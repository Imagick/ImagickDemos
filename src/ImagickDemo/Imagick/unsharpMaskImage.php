<?php

namespace ImagickDemo\Imagick;

class unsharpMaskImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
