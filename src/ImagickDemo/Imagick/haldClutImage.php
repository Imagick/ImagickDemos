<?php

namespace ImagickDemo\Imagick;

class haldClutImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Hald clut image";
    }

    function renderDescription()
    {
        return "Shamoan ";
    }

    public function render()
    {
        $output = "Generate hald palette with `convert   hald:8    hald_8.png`";
        $output .= $this->renderImageURL();

        return $output;
    }
}
