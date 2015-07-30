<?php

namespace ImagickDemo\ControlElement;

class Radius20 extends ValueElement
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
        return 100;
    }

    protected function getVariableName()
    {
        return 'radius';
    }

    protected function getDisplayName()
    {
        return 'Radius';
    }

    public function getRadius()
    {
        return $this->getValue();
    }
}
