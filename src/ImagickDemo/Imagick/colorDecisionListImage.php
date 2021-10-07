<?php

namespace ImagickDemo\Imagick;

class colorDecisionListImage extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "Color decision list image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
