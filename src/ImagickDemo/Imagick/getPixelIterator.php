<?php

namespace ImagickDemo\Imagick;

class getPixelIterator extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Get pixel iterator";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
