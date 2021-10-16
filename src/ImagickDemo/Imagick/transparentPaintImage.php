<?php

namespace ImagickDemo\Imagick;

class transparentPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transparentPaintImage";
    }

    function getOriginalFilename()
    {
        return realpath("images/BlueScreen.jpg");
    }


}
