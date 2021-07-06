<?php

namespace ImagickDemo\Params;

Imagick RGB color

#[\Attribute]
class GradientEndColor extends ColorElement
{
    protected function getDefault()
    {
        return 'white';
    }

    protected function getVariableName()
    {
        return 'gradientEndColor';
    }

    protected function getDisplayName()
    {
        return 'Gradient end';
    }

    public function getGradientEndColor()
    {
        return $this->getValue();
    }
}
