<?php

namespace ImagickDemo\ControlElement;

class BlueShift extends ValueElement
{
    public function getDefault()
    {
        return 1.5;
    }

    public function getMin()
    {
        return 0;
    }

    public function getMax()
    {
        return 255;
    }

    public function getVariableName()
    {
        return 'blueShift';
    }

    public function getDisplayName()
    {
        return 'Blueshift';
    }

    public function getBlueShift()
    {
        return $this->getValue();
    }
}
