<?php

namespace ImagickDemo\ControlElement;

class Sepia extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 55;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function getVariableName()
    {
        return 'sepia';
    }

    protected function getDisplayName()
    {
        return 'Sepia';
    }

    public function getSepia()
    {
        return $this->getValue();
    }
}
