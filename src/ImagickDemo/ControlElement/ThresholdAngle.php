<?php

namespace ImagickDemo\ControlElement;

class ThresholdAngle extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 10;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 90;
    }

    protected function getVariableName()
    {
        return 'thresholdAngle';
    }

    protected function getDisplayName()
    {
        return 'Threshold angle';
    }

    public function getThresholdAngle()
    {
        return $this->getValue();
    }
}
