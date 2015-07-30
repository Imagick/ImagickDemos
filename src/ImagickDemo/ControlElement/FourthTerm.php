<?php

namespace ImagickDemo\ControlElement;

class FourthTerm extends ValueElement
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
        return 'fourthTerm';
    }

    protected function getDisplayName()
    {
        return 'Fourth term';
    }

    public function getFourthTerm()
    {
        return $this->getValue();
    }
}
