<?php

namespace ImagickDemo\ControlElement;

class Bias extends ValueElement
{
    protected function getDefault()
    {
        return 0.5;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'bias';
    }

    protected function getDisplayName()
    {
        return 'Bias';
    }

    public function getBias()
    {
        return $this->getValue();
    }

    protected function filterValue($value)
    {
        return floatval($value);
    }
}
