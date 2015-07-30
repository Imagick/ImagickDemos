<?php

namespace ImagickDemo\ControlElement;

class ShearX extends ValueElement
{
    protected function getDefault()
    {
        return 15;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function getVariableName()
    {
        return 'shearX';
    }

    protected function getDisplayName()
    {
        return 'Shear X';
    }

    public function getShearX()
    {
        return $this->getValue();
    }
}
