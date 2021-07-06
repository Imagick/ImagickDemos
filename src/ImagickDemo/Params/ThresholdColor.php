<?php

namespace ImagickDemo\Params;


ImagickRGB color

#[\Attribute]
class ThresholdColor extends ColorElement
{
    protected function getDefault()
    {
        return 'rgb(127, 127, 127)';
    }

    protected function getVariableName()
    {
        return 'thresholdColor';
    }

    protected function getDisplayName()
    {
        return 'Threshold color';
    }

    public function getThresholdColor()
    {
        return $this->getValue();
    }
}
