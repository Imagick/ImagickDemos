<?php

namespace ImagickDemo\Imagick;

class charcoalImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
