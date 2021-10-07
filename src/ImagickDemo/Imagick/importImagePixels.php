<?php

namespace ImagickDemo\Imagick;

class importImagePixels extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Import image pixels";
    }


    public function render()
    {
        return $this->renderImageURL();
    }
}
