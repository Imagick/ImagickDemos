<?php

namespace ImagickDemo\ControlElement;

class KernelFirstTerm extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return '2';
    }

    protected function getMin()
    {
        return 1;
    }

    protected function getMax()
    {
        return 5;
    }

    protected function getVariableName()
    {
        return 'kernelFirstTerm';
    }

    protected function getDisplayName()
    {
        return 'First term';
    }

    public function getKernelFirstTerm()
    {
        return $this->getValue();
    }
}
