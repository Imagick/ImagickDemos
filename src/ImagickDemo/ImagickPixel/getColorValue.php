<?php

namespace ImagickDemo\ImagickPixel;

class getColorValue extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "get color value";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
//Example ImagickPixel::getColorValue
        $color = new \ImagickPixel('rgba(90%, 20%, 20%, 0.75)');

        $output =  "Alpha value is " . $color->getColorValue(\Imagick::COLOR_ALPHA) . "<br/>";
        $output .=  "" . "<br/>";
        $output .=  "Red value is " . $color->getColorValue(\Imagick::COLOR_RED) . "<br/>";
        $output .=  "Green value is " . $color->getColorValue(\Imagick::COLOR_GREEN) . "<br/>";
        $output .=  "Blue value is " . $color->getColorValue(\Imagick::COLOR_BLUE) . "<br/>";
        $output .=  "" . "<br/>";
        $output .=  "Cyan value is " . $color->getColorValue(\Imagick::COLOR_CYAN) . "<br/>";
        $output .=  "Magenta value is " . $color->getColorValue(\Imagick::COLOR_MAGENTA) . "<br/>";
        $output .=  "Yellow value is " . $color->getColorValue(\Imagick::COLOR_YELLOW) . "<br/>";
        $output .=  "Black value is " . $color->getColorValue(\Imagick::COLOR_BLACK) . "<br/>";
//Example end

        return $output;
    }
}
