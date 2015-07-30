<?php

namespace ImagickDemo\ControlElement;

class Raise extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'raise';
    }

    protected function getDisplayName()
    {
        return 'Raise';
    }

    protected function getOptions()
    {
        return [
            0 => 'Lower',
            1 => 'Raise',
        ];
    }

    public function getRaise()
    {
        return $this->key;
    }
}
