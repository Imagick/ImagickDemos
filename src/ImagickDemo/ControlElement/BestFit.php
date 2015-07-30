<?php

namespace ImagickDemo\ControlElement;

class BestFit extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'bestFit';
    }

    protected function getDisplayName()
    {
        return 'Best fit';
    }

    protected function getOptions()
    {
        return [
            0 => 'Disabled',
            1 => 'Enabled',
        ];
    }

    public function getBestFit()
    {
        return $this->key;
    }
}
