<?php

namespace ImagickDemo\ControlElement;

class MontageType extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::MONTAGEMODE_FRAME;
    }

    protected function getVariableName()
    {
        return 'montageType';
    }

    protected function getDisplayName()
    {
        return "Montage type";
    }

    public function getOptions()
    {
        return [
            \Imagick::MONTAGEMODE_FRAME => "Frame",
            \Imagick::MONTAGEMODE_UNFRAME => "Unframe",
            \Imagick::MONTAGEMODE_CONCATENATE => "Concatenate"
        ];
    }

    public function getMontageType()
    {
        return $this->getKey();
    }
}
