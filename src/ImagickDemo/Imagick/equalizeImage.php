<?php

namespace ImagickDemo\Imagick;

class equalizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
