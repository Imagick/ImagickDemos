<?php

namespace ImagickDemo\ControlElement;

class Sigma20 extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 20;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 200;
    }

    protected function getVariableName()
    {
        return 'sigma';
    }

    protected function getDisplayName()
    {
        return 'Sigma';
    }

    public function getSigma()
    {
        return $this->getValue();
    }
}
