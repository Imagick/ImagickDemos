<?php

namespace ImagickDemo\ControlElement;

class TextUnderColor extends ColorElement
{
    protected function getDefault()
    {
        return 'DeepPink2';
    }

    protected function getVariableName()
    {
        return 'textUnderColor';
    }

    protected function getDisplayName()
    {
        return 'Text under color';
    }

    public function getTextUnderColor()
    {
        return $this->getValue();
    }
}
