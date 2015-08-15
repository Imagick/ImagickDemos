<?php

namespace ImagickDemo\ControlElement;

class ReduceNoise extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 5;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 100;
    }

    protected function getVariableName()
    {
        return 'reduceNoise';
    }

    protected function getDisplayName()
    {
        return 'Reduce noise';
    }

    public function getReduceNoise()
    {
        return $this->getValue();
    }
}
