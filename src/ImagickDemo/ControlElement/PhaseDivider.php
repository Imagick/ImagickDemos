<?php

namespace ImagickDemo\ControlElement;

class PhaseDivider extends ValueElement
{
    protected function getDefault()
    {
        return 8;
    }

    protected function getMin()
    {
        return -30;
    }

    protected function getMax()
    {
        return 30;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'phaseDivider';
    }

    protected function getDisplayName()
    {
        return 'Phase divider';
    }

    public function getPhaseDivider()
    {
        return $this->getValue();
    }
}
