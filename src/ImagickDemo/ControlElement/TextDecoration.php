<?php

namespace ImagickDemo\ControlElement;

class TextDecoration extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::DECORATION_UNDERLINE;
    }

    protected function getVariableName()
    {
        return 'textDecoration';
    }

    protected function getDisplayName()
    {
        return 'Text decoration';
    }

    protected function getOptions()
    {
        return [
            \Imagick::DECORATION_NO => 'None',
            \Imagick::DECORATION_UNDERLINE => 'Underline',
            \Imagick::DECORATION_OVERLINE => 'Overline',
            \Imagick::DECORATION_LINETROUGH => 'Linethrough'
        ];
    }

    public function getTextDecoration()
    {
        return $this->key;
    }
}
