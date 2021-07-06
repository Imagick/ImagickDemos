<?php

namespace ImagickDemo\ControlElement;

class NumberDots extends ValueElement
{
    protected function getDefault()
    {
        return 40;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1024;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'numberDots';
    }

    protected function getDisplayName()
    {
        return 'Integer of dots';
    }

    public function getNumberDots()
    {
        return $this->getValue();
    }
}
