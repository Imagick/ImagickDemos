<?php

namespace ImagickDemo\ImagickPixel;

class getColorCount extends \ImagickDemo\Example
{
    
    public function renderDescription()
    {
        return "<br/><br/>The color count is the number of pixels in the image that have the same color as this ImagickPixel.<br/>ImagickPixel::getColorCount appears to only work for ImagickPixel objects created through Imagick::getImageHistogram()<br/>";
    }

    public function render()
    {
//Example ImagickPixel::getColorCount
        $imagick = new \Imagick();
        $imagick->newPseudoImage(640, 480, "magick:logo");
        $histogramElements = $imagick->getImageHistogram();
        $lastColor = array_pop($histogramElements);
        $color = $lastColor->getColor();

        $output = sprintf(
            "ColorCount last pixel = %d\nColor is R %d G %d B %d",
            $lastColor->getColorCount(),
            $color['r'],
            $color['g'],
            $color['b']
        );
        
        return nl2br($output);
//Example end
    }
}
