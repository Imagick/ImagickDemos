<?php

namespace ImagickDemo\ControlElement;

class Angle extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 45;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 360;
    }

    protected function getVariableName()
    {
        return 'angle';
    }

    protected function getDisplayName()
    {
        return 'Angle';
    }

    public function getAngle()
    {
        return $this->getValue();
    }
}
