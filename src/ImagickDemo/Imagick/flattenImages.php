<?php

namespace ImagickDemo\Imagick;

class flattenImages extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Flatten images";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
