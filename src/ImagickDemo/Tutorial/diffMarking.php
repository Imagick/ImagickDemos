<?php

namespace ImagickDemo\Tutorial;

class diffMarking extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Difference marking";
    }

    public function getOriginalImage()
    {
        return false;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
