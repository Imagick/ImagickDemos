<?php

namespace ImagickDemo\Imagick;

class getCopyright extends \ImagickDemo\Example
{
    public function render()
    {
        $output = '';
        $output .= "Copyright information is:<pre>";
        $output .= \Imagick::getCopyright();
        $output .= "</pre>";

        return $output;
    }
}
