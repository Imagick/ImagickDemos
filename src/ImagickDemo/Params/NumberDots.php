<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

class NumberDots implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(40),
            new RangeIntValue(0, 1024)
        );
    }

//class NumberDots extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 40;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 1024;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'numberDots';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Number of dots';
//    }
//
//    public function getNumberDots()
//    {
//        return $this->getValue();
//    }
}
