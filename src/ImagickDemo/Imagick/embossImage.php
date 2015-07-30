<?php

namespace ImagickDemo\Imagick;

class embossImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
