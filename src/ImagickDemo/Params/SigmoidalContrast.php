<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class SigmoidalContrast implements Param
{
    public function __construct(
        private int $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0.5),
            new RangeFloatValue(-1000, 1000)
        );
    }

//class SigmoidalContrast extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 0.5;
//    }
//
//    protected function getMin()
//    {
//        return -1000;
//    }
//
//    protected function getMax()
//    {
//        return 1000;
//    }
//
//    protected function getVariableName()
//    {
//        return 'sigmoidalContrast';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Contrast';
//    }
//
//    public function getSigmoidalContrast()
//    {
//        return $this->getValue();
//    }
}
