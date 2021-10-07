<?php

namespace ImagickDemo\Imagick;

class coalesceImages extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Coalesce images";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
