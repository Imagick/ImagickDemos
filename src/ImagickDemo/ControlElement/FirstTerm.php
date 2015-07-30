<?php

namespace ImagickDemo\ControlElement;

class FirstTerm extends ValueElement
{
    protected function getDefault()
    {
        return 0.5;
    }

    protected function getMin()
    {
        return -10000;
    }

    protected function getMax()
    {
        return 10000;
    }

    protected function getVariableName()
    {
        return 'firstTerm';
    }

    protected function getDisplayName()
    {
        return 'First term';
    }

    public function getFirstTerm()
    {
        return $this->getValue();
    }
}
