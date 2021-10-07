<?php

namespace ImagickDemo\ImagickPixel;

class getColorAsString extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "get color as string";
    }

    public function renderImageURL()
    {
        return "";
    }

    public function renderDescription()
    {
        return "Note - currently it is not possible to get the alpha of the color through this method.";
    }

    public function render()
    {
//Example ImagickPixel::getColorAsString
        $output = "Create an ImagickPixel with the predefined color 'brown' and output the result of `getColorAsString`. <br/>";
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);
        $output .= $color->getColorAsString();

        return $output;
//Example end
    }
}
