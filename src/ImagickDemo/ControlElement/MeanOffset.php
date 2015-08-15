<?php

namespace ImagickDemo\ControlElement;

class MeanOffset extends ValueElement
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
        return 10;
    }

    protected function getVariableName()
    {
        return 'meanOffset';
    }

    protected function getDisplayName()
    {
        return 'Mean offset';
    }

    public function getMeanOffset()
    {
        return $this->getValue();
    }
}
