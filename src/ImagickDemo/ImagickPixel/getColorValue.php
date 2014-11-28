<?php

namespace ImagickDemo\ImagickPixel;


class getColorValue extends \ImagickDemo\Example {


    function render() {
//Example ImagickPixel::getColorValue
        $color = new \ImagickPixel('rgba(90%, 20%, 20%, 0.75)');

        echo "Alpha value is " . $color->getColorValue(\Imagick::COLOR_ALPHA) . "<br/>";
        echo ""  . "<br/>";
        echo "Red value is " . $color->getColorValue(\Imagick::COLOR_RED)  . "<br/>";
        echo "Green value is " . $color->getColorValue(\Imagick::COLOR_GREEN)  . "<br/>";
        echo "Blue value is " . $color->getColorValue(\Imagick::COLOR_BLUE)  . "<br/>";
        echo "" . "<br/>";
        echo "Cyan value is " . $color->getColorValue(\Imagick::COLOR_CYAN)  . "<br/>";
        echo "Magenta value is " . $color->getColorValue(\Imagick::COLOR_MAGENTA)  . "<br/>";
        echo "Yellow value is " . $color->getColorValue(\Imagick::COLOR_YELLOW)  . "<br/>";
        echo "Black value is " . $color->getColorValue(\Imagick::COLOR_BLACK)  . "<br/>";
//Example end
    }
}