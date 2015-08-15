<?php

namespace ImagickDemo\ControlElement;

class Blur extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 1;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 50;
    }

    protected function getVariableName()
    {
        return 'blur';
    }

    protected function getDisplayName()
    {
        return 'Blur';
    }

    public function getBlur()
    {
        return $this->getValue();
    }
}
