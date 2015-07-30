<?php

namespace ImagickDemo\ControlElement;

class ThirdTerm extends ValueElement
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
        return 'thirdTerm';
    }

    protected function getDisplayName()
    {
        return 'Third term';
    }

    public function getThirdTerm()
    {
        return $this->getValue();
    }
}
