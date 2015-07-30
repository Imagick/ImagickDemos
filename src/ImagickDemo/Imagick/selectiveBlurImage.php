<?php

namespace ImagickDemo\Imagick;

class selectiveBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
