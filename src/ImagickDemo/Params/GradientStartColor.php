<?php

namespace ImagickDemo\Params;

Imagick RGB color

class GradientStartColor extends ColorElement
{
    protected function getDefault()
    {
        return 'black';
    }

    protected function getVariableName()
    {
        return 'gradientStartColor';
    }

    protected function getDisplayName()
    {
        return 'Gradient start';
    }

    public function getGradientStartColor()
    {
        return $this->getValue();
    }
}