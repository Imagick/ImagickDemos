<?php

namespace ImagickDemo\ControlElement;

class Inverse extends OptionKeyElement
{
    protected function getDefault()
    {
        return 0;
    }

    protected function getVariableName()
    {
        return 'inverse';
    }

    protected function getDisplayName()
    {
        return 'Inverse';
    }

    protected function getOptions()
    {
        return [
            0 => 'Normal',
            1 => 'Inverse',
        ];
    }

    public function getInverse()
    {
        return $this->key;
    }
}
