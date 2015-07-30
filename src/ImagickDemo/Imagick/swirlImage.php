<?php

namespace ImagickDemo\Imagick;

class swirlImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
