<?php

namespace ImagickDemo\Imagick;

class setImageBias extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageBias";
    }



    public function renderDescription()
    {
        return "For this to work on convolveImage, it requires ImageMagick version 6.9.9-1 otherwise it has no effect due to a bug.";
    }
}
