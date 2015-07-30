<?php

namespace ImagickDemo\ControlElement;

class StartAngle extends ValueElement
{
    protected function getDefault()
    {
        return 0;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 360;
    }

    protected function getVariableName()
    {
        return 'startAngle';
    }

    protected function getDisplayName()
    {
        return 'Start angle';
    }

    public function getStartAngle()
    {
        return $this->getValue();
    }
}
