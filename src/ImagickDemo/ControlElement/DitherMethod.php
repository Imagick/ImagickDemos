<?php

namespace ImagickDemo\ControlElement;

class DitherMethod extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::DITHERMETHOD_NO;
    }

    protected function getVariableName()
    {
        return 'ditherMethod';
    }

    protected function getDisplayName()
    {
        return 'Dither method';
    }

    protected function getOptions()
    {
        return [
            \Imagick::DITHERMETHOD_NO => 'None',
            \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
            \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
        ];
    }

    public function getDitherMethod()
    {
        return $this->key;
    }
}
