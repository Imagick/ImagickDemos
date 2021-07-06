<?php

namespace ImagickDemo\Params;

This is an ImagickRgbColor

#[\Attribute]
class FillModifiedColor extends ColorElement
{
    protected function getDefault()
    {
        return 'LightCoral';
    }

    protected function getVariableName()
    {
        return 'fillModifiedColor';
    }

    protected function getDisplayName()
    {
        return 'Fill modified color';
    }

    public function getFillModifiedColor()
    {
        return $this->getValue();
    }
}
