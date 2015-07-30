<?php

namespace ImagickDemo\Imagick;

class blurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
