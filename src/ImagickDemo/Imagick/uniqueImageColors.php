<?php

namespace ImagickDemo\Imagick;

class uniqueImageColors extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::uniqueImageColors";
    }

    public function render()
    {
        $output = "Extracts all the unique colors from an image, and generates and 1 pixel high, and 1 pixel wide for each color.";

        $output .= $this->renderImageURL();

        return $output;
    }
}
