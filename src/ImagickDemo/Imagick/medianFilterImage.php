<?php

namespace ImagickDemo\Imagick;

class medianFilterImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
