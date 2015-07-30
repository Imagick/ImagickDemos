<?php

namespace ImagickDemo\ControlElement;

class Width5 extends ValueElement
{

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
        return 'width';
    }

    protected function getDisplayName()
    {
        return 'Width';
    }

    public function getWidth()
    {
        return $this->getValue();
    }
}
