<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\MagnifyImageControl;

class magnifyImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Magnify image";
    }

    public function renderDescription()
    {
        return "The image may not look twice the size, as the size of it is constrained by the page layout.";
    }

    public static function getParamType(): string
    {
        return MagnifyImageControl::class;
    }
}
