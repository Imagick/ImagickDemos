<?php

namespace ImagickDemo\Imagick;

class deskewImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $output = "Hint - look at the left edge of the left column. In the deskewed image it is vertical.";

        return $output;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
