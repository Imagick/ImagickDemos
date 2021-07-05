<?php

namespace ImagickDemo\Params;

Unit Param with default of 0.9


class HighThreshold extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 0.9;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'highThreshold';
    }

    protected function getDisplayName()
    {
        return 'High threshold';
    }

    public function getHighThreshold()
    {
        return $this->getValue();
    }
}
