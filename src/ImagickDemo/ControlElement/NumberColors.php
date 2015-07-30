<?php

namespace ImagickDemo\ControlElement;

class NumberColors extends ValueElement
{
    protected function getDefault()
    {
        return 64;
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
        return 'numberColors';
    }

    protected function getDisplayName()
    {
        return 'Number colors';
    }

    public function getNumberColors()
    {
        return $this->getValue();
    }
}
