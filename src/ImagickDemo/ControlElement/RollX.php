<?php

namespace ImagickDemo\ControlElement;

class RollX extends ValueElement
{
    protected function filterValue($value)
    {
        return intval($value);
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
        return 800;
    }

    protected function getVariableName()
    {
        return 'rollX';
    }

    protected function getDisplayName()
    {
        return 'Roll X';
    }

    public function getRollX()
    {
        return $this->getValue();
    }
}
