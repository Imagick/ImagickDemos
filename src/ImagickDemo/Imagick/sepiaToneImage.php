<?php

namespace ImagickDemo\Imagick;

class sepiaToneImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::sepiaToneImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
