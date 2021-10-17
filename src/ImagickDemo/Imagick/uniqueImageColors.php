<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class uniqueImageColors extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::uniqueImageColors";
    }

    public function renderDescription()
    {
        $output = "Extracts all the unique colors from an image, and generates and 1 pixel high, and 1 pixel wide for each color.";
        return $output;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
