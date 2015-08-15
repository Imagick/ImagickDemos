<?php

namespace ImagickDemo\ControlElement;

class ShearY extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 5;
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
        return 'shearY';
    }

    protected function getDisplayName()
    {
        return 'Shear Y';
    }

    public function getShearY()
    {
        return $this->getValue();
    }
}
