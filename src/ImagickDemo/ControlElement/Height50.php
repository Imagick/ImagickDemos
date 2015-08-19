<?php

namespace ImagickDemo\ControlElement;

class Height50 extends ValueElement
{
    protected function filterValue($value)
    {
        return intval($value);
    }
    
    protected function getDefault()
    {
        return 50;
    }

    protected function getMin()
    {
        return 1;
    }

    protected function getMax()
    {
        return 1000;
    }

    protected function getVariableName()
    {
        return 'height';
    }

    protected function getDisplayName()
    {
        return 'Height';
    }

    public function getHeight()
    {
        return $this->getValue();
    }
}
