<?php

namespace ImagickDemo\Imagick;

class rollImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
