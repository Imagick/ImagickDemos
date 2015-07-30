<?php

namespace ImagickDemo\ControlElement;

class ContrastType extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'contrastType';
    }

    protected function getDisplayName()
    {
        return 'Contrast type';
    }

    protected function getOptions()
    {
        return [
            0 => 'Enabled - unsharpen',
            1 => 'Enabled - sharpen',
            2 => 'Disabled'
        ];
    }

    public function getContrastType()
    {
        return $this->key;
    }
}
