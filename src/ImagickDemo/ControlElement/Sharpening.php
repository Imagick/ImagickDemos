<?php

namespace ImagickDemo\ControlElement;

class Sharpening extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'sharpening';
    }

    protected function getDisplayName()
    {
        return 'Contrast';
    }

    protected function getOptions()
    {
        return [
            0 => 'Decrease',
            1 => 'Increase',
        ];
    }

    public function getSharpening()
    {
        return $this->key;
    }
}
