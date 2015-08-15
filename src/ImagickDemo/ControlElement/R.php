<?php

namespace ImagickDemo\ControlElement;

class R extends ValueElement
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
        return 'r';
    }

    protected function getDisplayName()
    {
        return 'R';
    }

    public function getR()
    {
        return $this->getValue();
    }
}
