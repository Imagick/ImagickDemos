<?php

namespace ImagickDemo\ImagickPixel;


class getColorCount extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickPixel/getColorCount'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create an ImagickPixel with the predefined color 'brown'
        $color = new \ImagickPixel('red');

////Set the color to have an alpha of 25% 
//$color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);

        $colorInfo = $color->getColorCount();


        var_dump($colorInfo);
//Outputs

    }

}