<?php

namespace ImagickDemo\ControlElement;

class InnerBevel extends ValueElement
{
    protected function getDefault()
    {
        return 3;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 50;
    }

    protected function getVariableName()
    {
        return 'innerBevel';
    }

    protected function getDisplayName()
    {
        return 'Inner bevel';
    }

    public function getInnerBevel()
    {
        return $this->getValue();
    }
}
