<?php

namespace ImagickDemo\Imagick;

class annotateImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
