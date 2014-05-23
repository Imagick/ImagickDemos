<?php

namespace ImagickDemo\ImagickPixel;


class getColorValueQuantum extends \ImagickDemo\Example {

    function render() {
        $color = new \ImagickPixel('rgb(165, 42, 42)');
        $colorRed = $color->getColorValueQuantum(\Imagick::COLOR_RED);
        $colorGreen = $color->getColorValueQuantum(\Imagick::COLOR_GREEN);
        $colorBlue = $color->getColorValueQuantum(\Imagick::COLOR_BLUE);

        echo "red: $colorRed Green: $colorGreen blue $colorBlue";

        $colorInfo = $color->getColor();
        var_dump($colorInfo);
    }
}