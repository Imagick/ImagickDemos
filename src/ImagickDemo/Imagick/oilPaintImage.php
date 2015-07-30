<?php

namespace ImagickDemo\Imagick;

class oilPaintImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
