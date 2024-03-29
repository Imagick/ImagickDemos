<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Controls\ImageControl;

class clear extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Clear";
    }

    public function renderDescription()
    {
        return "Clears the resources used by the ImagePixelIterator. This may be required if you are processing many images in one script - which is not recommended.";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
