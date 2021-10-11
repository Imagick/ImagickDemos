<?php

namespace ImagickDemo\Imagick;

class opaquePaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::opaquePaintImage";
    }

    public function getOriginalFilename()
    {
        return realpath("images/BlueScreen.jpg");
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
