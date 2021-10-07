<?php

namespace ImagickDemo\ImagickPixel;

class getHSL extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "get HSL";
    }


    public function render()
    {
//Example ImagickPixel::getHSL
        $colorString = 'rgb(90%, 10%, 10%)';

        $output = "The result of getHSL for the color '$colorString' is:<br/>";

        $color = new \ImagickPixel($colorString);
        $colorInfo = $color->getHSL();

        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }

        return $output;
//Example end
    }
}
