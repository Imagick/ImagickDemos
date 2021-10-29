<?php

namespace ImagickDemo\ImagickPixel;

class getColorQuantum extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "ImagickPixel::getColorQuantum";
    }

    public function renderDescription()
    {
        $value = \Imagick::getQuantum();
        $html = <<< HTML
 Gets the values of the different color channels of an ImagickPixel object, in the range 0 to Imagick::getQuantum() 
aka 0 to $value on this computer. 
HTML;

        return $html;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = "Create an ImagickPixel with the predefined color 'brown' and set the color to have an alpha of 25% <br/>";

//Example ImagickPixel::getColorQuantum
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 0.25);

        $output .= "<h4>Values</h4>";
        foreach ($color->getColorQuantum() as $key => $value) {
            $output .= "$key : " . var_export($value, true) . " <br/>";
        }
//Example end

        return $output;
    }
}
