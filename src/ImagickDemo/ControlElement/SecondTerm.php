<?php

namespace ImagickDemo\ControlElement;

class SecondTerm extends ValueElement
{
    protected function getDefault()
    {
        return '';
    }

    protected function getMin()
    {
        return -1000;
    }

    protected function getMax()
    {
        return 10000;
    }

    protected function getVariableName()
    {
        return 'secondTerm';
    }

    protected function getDisplayName()
    {
        return 'Second term';
    }

    public function getSecondTerm()
    {
        return $this->getValue();
    }
}
