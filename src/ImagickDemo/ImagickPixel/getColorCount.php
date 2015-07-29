<?php

namespace ImagickDemo\ImagickPixel;

class getColorCount extends \ImagickDemo\Example
{

    public function render()
    {
//Example ImagickPixel::getColorCount
        $output = "I have pretty much no idea what this function is meant " .
            "to do...if you know I'd love to hear.<br/>";

        $color = new \ImagickPixel('red');
        $colorInfo = $color->getColorCount();
        $output .= var_export($colorInfo, true);

        return $output;
//Example end
    }
}
