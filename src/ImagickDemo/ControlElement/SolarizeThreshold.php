<?php

namespace ImagickDemo\ControlElement;

class SolarizeThreshold extends ValueElement
{
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
