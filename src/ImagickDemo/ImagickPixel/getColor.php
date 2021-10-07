<?php

namespace ImagickDemo\ImagickPixel;

class getColor extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Get color";
    }


    public function render()
    {
        $output = "Create an ImagickPixel with the predefined color 'brown' and set the color to have an alpha of 25% <br/>";

//Example ImagickPixel::getColor
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 0.25);

        $output .= "<h4>Standard values</h4>";
        foreach ($color->getColor() as $key => $value) {
            $output .= "$key : $value <br/>";
        }

        $output .= "<br/>";

        $output .= "<h4>Normalized values</h4>";
        foreach ($color->getColor(true) as $key => $value) {
            $output .= "$key : $value <br/>";
        }
//Example end

        return $output;
    }
}
