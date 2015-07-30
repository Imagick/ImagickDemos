<?php

namespace ImagickDemo\ControlElement;

class ModulateSaturation extends ValueElement
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
        return 200;
    }

    protected function getVariableName()
    {
        return 'saturation';
    }

    protected function getDisplayName()
    {
        return 'Saturation';
    }

    public function getSaturation()
    {
        return $this->getValue();
    }
}
