<?php

namespace ImagickDemo\ControlElement;

class EndAngle extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 270;
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
        return 'endAngle';
    }

    protected function getDisplayName()
    {
        return 'End angle';
    }

    public function getEndAngle()
    {
        return $this->getValue();
    }
}
