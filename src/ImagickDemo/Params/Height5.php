<?php

namespace ImagickDemo\Params;

Height with default of 5 and 1, 100

#[\Attribute]
class Height5 extends ValueElement
{
    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getDefault()
    {
        return 5;
    }

    protected function getMin()
    {
        return 1;
    }

    protected function getMax()
    {
        return 100;
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
