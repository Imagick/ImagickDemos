<?php

namespace ImagickDemo\Imagick;

class morphImages extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Morph images";
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
