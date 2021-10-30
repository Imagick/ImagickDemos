<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;

use ImagickDemo\Imagick\Controls\SampleImageControl;

class sampleImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::sampleImage";
    }

    public static function getParamType(): string
    {
        return SampleImageControl::class;
    }
}
