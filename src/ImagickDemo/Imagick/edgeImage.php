<?php

namespace ImagickDemo\Imagick;

class edgeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
