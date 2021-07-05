<?php

namespace ImagickDemo\Params;

unit range with default of 0.1

class LowThreshold extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return 0.1;
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
        return 'lowThreshold';
    }

    protected function getDisplayName()
    {
        return 'Low threshold';
    }

    public function getLowThreshold()
    {
        return $this->getValue();
    }
}
