<?php

namespace ImagickDemo\ControlElement;

class Amount extends ValueElement
{
    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return 5;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 20;
    }

    protected function getVariableName()
    {
        return 'amount';
    }

    protected function getDisplayName()
    {
        return 'Amount';
    }

    public function getAmount()
    {
        return $this->getValue();
    }
}
