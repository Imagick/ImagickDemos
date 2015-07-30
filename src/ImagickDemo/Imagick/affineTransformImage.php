<?php

namespace ImagickDemo\Imagick;

class affineTransformImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return $output = "This appears to not be working.<br/>";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
