<?php

namespace ImagickDemo\Imagick;

class filter extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function renderTitle()
    {
        return "Filter";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
