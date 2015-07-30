<?php

namespace ImagickDemo\Imagick;

class blueShiftImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
