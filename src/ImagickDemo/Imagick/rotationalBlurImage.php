<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\RotationalBlurImageControl;

class rotationalBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rotationalBlurImage";
    }

    public function renderDescription()
    {
        $output = "I have no idea how this is different from radialBlurImage. radialBlur is deprecated in ImageMagick";
        return $output;
    }

    public static function getParamType(): string
    {
        return RotationalBlurImageControl::class;
    }
}
