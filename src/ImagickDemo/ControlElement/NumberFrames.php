<?php

namespace ImagickDemo\ControlElement;

class NumberFrames extends ValueElement
{
    protected function getDefault()
    {
        return 25;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 512;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'numberFrames';
    }

    protected function getDisplayName()
    {
        return 'Number of frames';
    }

    public function getNumberFrames()
    {
        return $this->getValue();
    }
}
