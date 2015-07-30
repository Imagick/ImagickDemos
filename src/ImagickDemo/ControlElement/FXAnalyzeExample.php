<?php

namespace ImagickDemo\ControlElement;

class FXAnalyzeExample extends OptionKeyElement
{
    public function getVariableName()
    {
        return 'fxAnalyzeExample';
    }

    public function getDefault()
    {
        return 'example1';
    }

    public function getDisplayName()
    {
        return "FX Analyze example";
    }

    public function getOptions()
    {
        $listOfExamples = [
            'example1' => 'Sinusoid',
            'example2' => 'Linear gradient',
            'example3' => 'Gamma gradient',
            'example4' => 'Squished sinusoid',
        ];

        return $listOfExamples;
    }

    public function getCompositeExampleType()
    {
        return $this->getKey();
    }
}
