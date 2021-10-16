<?php

namespace ImagickDemo\Imagick;

class floodFillPaintImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Flood fill paint image";
    }


    public function getOriginalFilename()
    {
        return realpath("images/BlueScreen.jpg");
    }


}
