<?php

namespace ImagickDemo\ControlElement;

class UnsharpThreshold extends ValueElement
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
        return 20;
    }

    protected function getVariableName()
    {
        return 'unsharpThreshold';
    }

    protected function getDisplayName()
    {
        return 'Unsharp threshold';
    }

    public function getUnsharpThreshold()
    {
        return $this->getValue();
    }
}
