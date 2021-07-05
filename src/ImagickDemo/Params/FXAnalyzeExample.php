<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class FXAnalyzeExample implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('fxAnalyzeExample'),
            new EnumMap([
                'example1' => 'Sinusoid',
                'example2' => 'Linear gradient',
                'example3' => 'Gamma gradient',
                'example4' => 'Squished sinusoid',
            ])
        );
    }

//class FXAnalyzeExample extends OptionKeyElement
//{
//    public function getVariableName()
//    {
//        return 'fxAnalyzeExample';
//    }
//
//    public function getDefault()
//    {
//        return 'example1';
//    }
//
//    public function getDisplayName()
//    {
//        return "FX Analyze example";
//    }
//
//    public function getOptions()
//    {
//        $listOfExamples = [
//            'example1' => 'Sinusoid',
//            'example2' => 'Linear gradient',
//            'example3' => 'Gamma gradient',
//            'example4' => 'Squished sinusoid',
//        ];
//
//        return $listOfExamples;
//    }
//
//    public function getCompositeExampleType()
//    {
//        return $this->getKey();
//    }
}
