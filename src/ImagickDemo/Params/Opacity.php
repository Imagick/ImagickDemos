<?php

namespace ImagickDemo\Params;

component range - default 100
#[\Attribute]
class Opacity extends ValueElement
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
        return 255;
    }

    protected function getVariableName()
    {
        return 'opacity';
    }

    protected function getDisplayName()
    {
        return 'Opacity';
    }

    public function getOpacity()
    {
        return $this->getValue();
    }
}
