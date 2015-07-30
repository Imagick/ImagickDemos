<?php

namespace ImagickDemo\ControlElement;

class LoopTime extends ValueElement
{
    protected function getDefault()
    {
        return 160;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1024;
    }

    protected function filterValue($value)
    {
        return intval($value);
    }

    protected function getVariableName()
    {
        return 'loopTime';
    }

    protected function getDisplayName()
    {
        return 'Loop time';
    }

    public function getLoopTime()
    {
        return $this->getValue();
    }
}
