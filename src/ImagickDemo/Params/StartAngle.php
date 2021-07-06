<?php

namespace ImagickDemo\Params;

AngleRange default 0

#[\Attribute]
class StartAngle extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

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
