<?php

namespace ImagickDemo\Params;

ComponentRangeFloat default of 0.5

class Threshold extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 0.5;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function getVariableName()
    {
        return 'threshold';
    }

    protected function getDisplayName()
    {
        return 'Threshold';
    }

    public function getThreshold()
    {
        return $this->getValue();
    }
}
