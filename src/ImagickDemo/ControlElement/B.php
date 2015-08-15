<?php

namespace ImagickDemo\ControlElement;

class B extends ValueElement
{
    protected function filterValue($value)
    {
        return intval($value);
    }
    
    protected function getDefault()
    {
        return 100;
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
        return 'b';
    }

    protected function getDisplayName()
    {
        return 'B';
    }

    public function getB()
    {
        return $this->getValue();
    }
}
