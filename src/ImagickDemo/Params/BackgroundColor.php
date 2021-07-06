<?php

namespace ImagickDemo\Params;

// TODO - not needed - this is just an ImagickColor

#[\Attribute]
class BackgroundColor extends ColorElement
{
    protected function getDefault()
    {
        return 'rgb(225, 225, 225)';
    }

    protected function getVariableName()
    {
        return 'backgroundColor';
    }

    protected function getDisplayName()
    {
        return 'Background color';
    }

    public function getBackgroundColor()
    {
        return $this->getValue();
    }
}
