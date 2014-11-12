<?php


namespace ImagickDemo\ControlElement;


class FXAnalyzeExample extends OptionKeyElement {

    function getVariableName() {
        return 'fxAnalyzeExample';
    }

    function getDefault() {
        return 'example1';
    }

    function getDisplayName() {
        return "FX Analyze example";
    }

    function getOptions() {
        $listOfExamples = [
            'example1' => 'Sinusoid',
            'example2' => 'Linear gradient',
            'example3' => 'Gamma gradient',
            'example4' => 'Squished sinusoid',
        ];

        return $listOfExamples;
    }

    function getCompositeExampleType() {
        return $this->getKey();
    }
}

 