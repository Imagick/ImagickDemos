<?php

namespace ImagickDemo\ControlElement;

class Brightness extends ValueElement
{
    protected function getDefault()
    {
        return -20;
    }

    protected function getMin()
    {
        return -100;
    }

    protected function getMax()
    {
        return 100;
    }

    protected function getVariableName()
    {
        return 'brightness';
    }

    protected function getDisplayName()
    {
        return 'Brightness';
    }

    public function getBrightness()
    {
        return $this->getValue();
    }
}
