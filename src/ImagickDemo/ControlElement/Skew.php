<?php

namespace ImagickDemo\ControlElement;

class Skew extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 10;
    }

    protected function getMin()
    {
        return -500;
    }

    protected function getMax()
    {
        return 500;
    }

    protected function getVariableName()
    {
        return 'skew';
    }

    protected function getDisplayName()
    {
        return 'Skew';
    }

    public function getSkew()
    {
        return $this->getValue();
    }
}
