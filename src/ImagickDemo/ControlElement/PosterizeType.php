<?php

namespace ImagickDemo\ControlElement;

class PosterizeType extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::DITHERMETHOD_RIEMERSMA;
    }

    protected function getVariableName()
    {
        return 'posterizeType';
    }

    protected function getDisplayName()
    {
        return "Posterize type";
    }

    protected function getOptions()
    {
        $images = [
            \Imagick::DITHERMETHOD_NO => 'None',
            \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
            \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
        ];

        return $images;
    }

    public function getPosterizeType()
    {
        return $this->getKey();
    }
}
