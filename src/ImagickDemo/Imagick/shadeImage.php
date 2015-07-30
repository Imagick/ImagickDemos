<?php

namespace ImagickDemo\Imagick;

class shadeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        return $this->renderImageURL();
    }
}
