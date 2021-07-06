<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

ComponentRangeFloat

#[\Attribute]
class SmoothThreshold extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 5;
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
        return 'smoothThreshold';
    }

    protected function getDisplayName()
    {
        return 'Smooth threshold';
    }

    public function getSmoothThreshold()
    {
        return $this->getValue();
    }
}
