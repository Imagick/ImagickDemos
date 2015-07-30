<?php

namespace ImagickDemo\ControlElement;

class NumberLevels extends ValueElement
{
    protected function getDefault()
    {
        return 8;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 256;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'numberLevels';
    }

    protected function getDisplayName()
    {
        return 'Number Levels';
    }

    public function getNumberLevels()
    {
        return $this->getValue();
    }
}
