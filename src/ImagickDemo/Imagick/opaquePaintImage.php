<?php

namespace ImagickDemo\Imagick;

class opaquePaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::opaquePaintImage";
    }

    public function getOriginalFilename(): string|null
    {
        return realpath("images/BlueScreen.jpg");
    }


}
