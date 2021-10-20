<?php

namespace ImagickDemo\Imagick;

class queryFonts extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::queryFonts";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
//Example Imagick::queryFonts
        $output = '';
        $output .= "Fonts that match 'Helvetica*' are:<br/>";
        $fontList = \Imagick::queryFonts("Helvetica*");
        foreach ($fontList as $fontName) {
            $output .= '<li>' . $fontName . "</li>";
        }


        $output .= "Fonts that match '*' are:<br/>";
        $fontList = \Imagick::queryFonts("*");
        foreach ($fontList as $fontName) {
            $output .= '<li>' . $fontName . "</li>";
        }

        return $output;
//Example end
    }
}
