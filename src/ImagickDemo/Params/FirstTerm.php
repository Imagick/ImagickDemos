<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

#[\Attribute]
class FirstTerm implements Param
{
    public function __construct(
        private float $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinFloatValue(-10000),
            new MaxFloatValue(10000),
        );
    }


//class FirstTerm extends ValueElement
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
//        return -10000;
//    }
//
//    protected function getMax()
//    {
//        return 10000;
//    }
//
//    protected function getVariableName()
//    {
//        return 'firstTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'First term';
//    }
//
//    public function getFirstTerm()
//    {
//        return $this->getValue();
//    }
}
