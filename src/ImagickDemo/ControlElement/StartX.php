<?php

namespace ImagickDemo\ControlElement;

class StartX extends ValueElement
{
    protected function getDefault()
    {
        return 50;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 250;
    }

    protected function getVariableName()
    {
        return 'startX';
    }

    protected function getDisplayName()
    {
        return 'Start X';
    }

    public function getStartX()
    {
        return $this->getValue();
    }
}
