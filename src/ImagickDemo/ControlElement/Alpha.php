<?php

namespace ImagickDemo\ControlElement;

class Alpha extends ValueElement
{
    protected function filterValue($value)
    {
        return intval($value);
    }
    
    protected function getDefault()
    {
        return 0;
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
        return 'alpha';
    }

    protected function getDisplayName()
    {
        return 'Alpha';
    }

    public function getAlpha()
    {
        return $this->getValue();
    }
}
