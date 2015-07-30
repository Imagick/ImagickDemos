<?php

namespace ImagickDemo\ControlElement;

class RoundX extends ValueElement
{
    protected function getDefault()
    {
        return 100;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 500;
    }

    protected function getVariableName()
    {
        return 'roundX';
    }

    protected function getDisplayName()
    {
        return 'Round X';
    }

    public function getRoundX()
    {
        return $this->getValue();
    }
}
