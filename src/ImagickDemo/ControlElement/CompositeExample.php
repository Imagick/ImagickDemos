<?php

namespace ImagickDemo\ControlElement;

class CompositeExample extends OptionKeyElement
{
    public function getVariableName()
    {
        return 'compositeExample';
    }

    public function getDefault()
    {
        return 'screenGradients';
    }

    public function getDisplayName()
    {
        return "Composite example";
    }

    public function getOptions()
    {
        return \ImagickDemo\Tutorial\composite::getExamples();
    }

    public function getCompositeExampleType()
    {
        return $this->getKey();
    }
}
