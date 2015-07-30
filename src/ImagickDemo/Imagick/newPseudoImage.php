<?php

namespace ImagickDemo\Imagick;

class newPseudoImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "Note, image size is not used for all canvas types. Some have a single set size e.g. rose, logo.";
    }

    public function render()
    {
        $output = $this->renderDescription();
        $output .= $this->renderImageURL();

        return $output;
    }
}
