<?php

namespace ImagickDemo\Imagick;

class gaussianBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
