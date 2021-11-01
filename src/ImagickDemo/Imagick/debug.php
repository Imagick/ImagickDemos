<?php

namespace ImagickDemo\Imagick;

class debug extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Debugging....";
    }

    public function renderDescription()
    {
        $output = "I r debugging.";
        $output .= "<br/>";

        return $output;
    }
}
