<?php

namespace ImagickDemo\ControlElement;

class ModulateHue extends ValueElement
{
    protected function getDefault()
    {
        return 150;
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
        return 'hue';
    }

    protected function getDisplayName()
    {
        return 'Hue';
    }

    public function getHue()
    {
        return $this->getValue();
    }
}
