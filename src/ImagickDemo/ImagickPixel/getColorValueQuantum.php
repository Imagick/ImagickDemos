<?php

namespace ImagickDemo\ImagickPixel;


class getColorValueQuantum extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickPixel/getColorValueQuantum'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create an ImagickPixel with the predefined color 'brown'
//$color = new \ImagickPixel('brown');

        $color = new \ImagickPixel('rgb(165, 42, 42)');


        $colorRed = $color->getColorValueQuantum(\Imagick::COLOR_RED);
        $colorGreen = $color->getColorValueQuantum(\Imagick::COLOR_GREEN);
        $colorBlue = $color->getColorValueQuantum(\Imagick::COLOR_BLUE);

        echo "red: $colorRed Green: $colorGreen blue $colorBlue";

//red: 42405 Green: 10794 blue 10794


// 42405 * 255 / (2 ^ 16 - 1) =
// 42405 * 255 / 65,535 = 165.6471


// 165 * (2^16 - 1) / 255 = 42405 

        $colorInfo = $color->getColor();
        var_dump($colorInfo);


//
//array (size=4)
//  'r' => int 165
//  'g' => int 42
//  'b' => int 42
//  'a' => int 1


    }
}