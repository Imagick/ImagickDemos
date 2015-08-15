<?php

namespace ImagickDemo\ControlElement;

class KernelThirdTerm extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return false;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 5;
    }

    protected function getVariableName()
    {
        return 'kernelThirdTerm';
    }

    protected function getDisplayName()
    {
        return 'Third term';
    }

    public function getKernelThirdTerm()
    {
        return $this->getValue();
    }
}
