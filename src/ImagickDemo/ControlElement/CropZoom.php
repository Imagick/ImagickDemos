<?php

namespace ImagickDemo\ControlElement;

class CropZoom extends OptionKeyElement
{
    protected function getDefault()
    {
        return 1;
    }

    protected function getVariableName()
    {
        return 'cropZoom';
    }

    protected function getDisplayName()
    {
        return 'Crop + zoom';
    }

    protected function getOptions()
    {
        return [
            0 => 'Disabled',
            1 => 'Enabled',
        ];
    }

    public function getCropZoom()
    {
        return $this->key;
    }
}
