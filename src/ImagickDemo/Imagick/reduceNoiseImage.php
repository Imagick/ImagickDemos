<?php

namespace ImagickDemo\Imagick;

class reduceNoiseImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
