<?php

namespace ImagickDemo\ControlElement;

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
