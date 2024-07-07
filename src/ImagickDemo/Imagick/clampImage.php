<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ClampImageControl;

class clampImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::clampImage";
    }

    public function renderDescription()
    {
        $content = "<p>ClampImage() restricts the color range from 0 to the quantum depth.</p>";

        $content .= "<p>This is probably of use when adjusting the brightness of an image. Under certain circumstances it is possible for an image to have pixels that are 'brighter' than the maximum (a.k.a. quantum) range. I think when ImageMagick is compiled with HDRI mode enabled.</p>";

        $content .= "<p>Some image processing that ImageMagick can do, just do not work when colours are brighter than maximum. In particular I think that the hue calculations done in modulateImage just don't work as expected, as the maths inside them assumes that 'maximum brightness' is the, well, maximum brightness.</p>";

        $content .= "<p>The example below does <b>not</b> show this usage. Someone needs </p>";
        
        return $content;
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ClampImageControl::class;
    }
}
