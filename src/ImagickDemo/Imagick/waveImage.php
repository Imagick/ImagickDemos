<?php

namespace ImagickDemo\Imagick;

class waveImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
