<?php

namespace ImagickDemo\Imagick;

class queryFonts extends \ImagickDemo\Example {

    function render() {
//Example Imagick::queryFonts
        $output = '';
        $output .= "Fonts that match 'Helvetica*' are:<br/>";

        $fontList = \Imagick::queryFonts("Helvetica*");
 
        foreach ($fontList as $fontName) {
            $output .= '<li>'. $fontName."</li>";
        }

        return $output;
//Example end
    }
}