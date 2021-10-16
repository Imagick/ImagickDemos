<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Image;

class creatingGifs extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Creating gifs";
    }

    public function renderDescription()
    {
        return '';
    }



    /**
     *
     */
    public function renderCustomImage()
    {
        $imagick = new \Imagick();
        $imagick->setcolorspace(\Imagick::COLORSPACE_GRAY);
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_POW, 0.5);
        Image::analyzeImage($imagick);
    }
}
