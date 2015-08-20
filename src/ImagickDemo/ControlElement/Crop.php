<?php

namespace ImagickDemo\ControlElement;

class Crop extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'crop';
    }

    protected function getDisplayName()
    {
        return 'Crop';
    }

    protected function getOptions()
    {
        return [
            0 => 'Disabled',
            1 => 'Enabled',
        ];
    }

    public function getCrop()
    {
        return $this->key;
    }
}
