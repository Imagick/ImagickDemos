<?php

namespace ImagickDemo\ControlElement;

class ResizeHeight extends ValueElement
{
    protected function getDefault()
    {
        return 200;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1000;
    }

    protected function getVariableName()
    {
        return 'height';
    }

    protected function getDisplayName()
    {
        return 'Height';
    }

    protected function getHeight()
    {
        return $this->getValue();
    }
}
