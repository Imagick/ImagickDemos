<?php

namespace ImagickDemo\ControlElement;

class KernelSecondTerm extends ValueElement
{
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
        return 'kernelSecondTerm';
    }

    protected function getDisplayName()
    {
        return 'Second term';
    }

    public function getKernelSecondTerm()
    {
        return $this->getValue();
    }
}
