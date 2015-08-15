<?php

namespace ImagickDemo\ControlElement;

class SigmoidalContrast extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 0.5;
    }

    protected function getMin()
    {
        return -1000;
    }

    protected function getMax()
    {
        return 1000;
    }

    protected function getVariableName()
    {
        return 'sigmoidalContrast';
    }

    protected function getDisplayName()
    {
        return 'Contrast';
    }

    public function getSigmoidalContrast()
    {
        return $this->getValue();
    }
}
