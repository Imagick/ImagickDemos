<?php

namespace ImagickDemo\Params;

UnitRange 0.2 default

class SolarizeThreshold extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 0.2;
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
        return 'solarizeThreshold';
    }

    protected function getDisplayName()
    {
        return 'Solarize threshold';
    }

    public function getSolarizeThreshold()
    {
        return $this->getValue();
    }
}
