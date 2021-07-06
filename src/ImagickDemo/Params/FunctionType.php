<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class FunctionType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('renderImageSinusoid'),
            new EnumMap([
                "renderImagePolynomial" => 'Polynomial',
                "renderImageSinusoid" => 'Sinusoid',
                "renderImageArcsin" => "Arc sin",
                "renderImageArctan" => "Arc tan"
            ])
        );
    }

//class FunctionType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 'renderImageSinusoid';
//    }
//
//    protected function getVariableName()
//    {
//        return 'imagickFunction';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Function";
//    }
//
//    public function getOptions()
//    {
//        return [
//            "renderImagePolynomial" => 'Polynomial',
//            "renderImageSinusoid" => 'Sinusoid',
//            "renderImageArcsin" => "Arc sin",
//            "renderImageArctan" => "Arc tan"
//        ];
//    }
//
//    public function getFunctionType()
//    {
//        return $this->getKey();
//    }
}
