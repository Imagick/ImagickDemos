<?php

namespace ImagickDemo\Imagick;

class remapImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function renderDescription()
    {
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
