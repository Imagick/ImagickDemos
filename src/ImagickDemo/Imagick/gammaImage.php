<?php

namespace ImagickDemo\Imagick;

class gammaImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
