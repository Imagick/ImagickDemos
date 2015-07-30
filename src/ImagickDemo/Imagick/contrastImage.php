<?php

namespace ImagickDemo\Imagick;

class contrastImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
