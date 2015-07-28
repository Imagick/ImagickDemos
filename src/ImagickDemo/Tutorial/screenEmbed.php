<?php

namespace ImagickDemo\Tutorial;

class screenEmbed extends \ImagickDemo\Example
{
    public function render()
    {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }
}
