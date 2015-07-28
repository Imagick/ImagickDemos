<?php

namespace ImagickDemo\Tutorial;

use Imagick;

class svgExample extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }
}
