<?php

namespace ImagickDemo\ImagickPixel;

class setHSL extends \ImagickDemo\Example
{
    public function render()
    {

//Example ImagickPixel::setHSL

        $output = "This example creates a red color, rotates the hue by 180 degrees and sets the new color.<br/>";

        //Create an almost pure red color
        $color = new \ImagickPixel('rgb(90%, 10%, 10%)');
        $originalColor = clone $color;

        //Get it's HSL values
        $colorInfo = $color->getHSL();

        //Rotate the hue by 180 degrees
        $newHue = $colorInfo['hue'] + 0.5;
        if ($newHue > 1) {
            $newHue = $newHue - 1;
        }

        //Set the ImagickPixel to the new color
        $color->setHSL($newHue, $colorInfo['saturation'], $colorInfo['luminosity']);


        $output .= "<h3>Original color</h3>";
        $colorInfo = $originalColor->getcolor();
        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }


        $output .= "<h3>Rotated color</h3>";
        //Check that the new color is blue/green
        $colorInfo = $color->getcolor();
        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }

        return $output;
//Example end
    }
}
