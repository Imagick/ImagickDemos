<?php

namespace ImagickDemo\ControlElement;

class ModulateBrightness extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
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
