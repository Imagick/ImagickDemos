<?php

namespace ImagickDemo\ControlElement;

class Length extends ValueElement
{
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
        return 500;
    }

    protected function getVariableName()
    {
        return 'length';
    }

    protected function getDisplayName()
    {
        return 'Length';
    }

    public function getLength()
    {
        return $this->getValue();
    }
}
