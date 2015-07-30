<?php

namespace ImagickDemo\ControlElement;

class SmoothThreshold extends ValueElement
{
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
