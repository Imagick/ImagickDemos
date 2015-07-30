<?php

namespace ImagickDemo\Imagick;

class despeckleImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
