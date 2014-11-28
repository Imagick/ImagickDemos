<?php

namespace ImagickDemo\ImagickPixel;


class getColorAsString extends \ImagickDemo\Example {

    function renderImageURL() {
        return "";
    }

    function renderDescription() {
        return "Note - currently it is not possible to get the alpha of the color through this method.";
    }
    
    function render() {
//Example ImagickPixel::getColorAsString
        $output = "Create an ImagickPixel with the predefined color 'brown' and output the result of `getColorAsString`. <br/>";
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);
        $output .= $color->getColorAsString();

        return $output;
//Example end
    }
}