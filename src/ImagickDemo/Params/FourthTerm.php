<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class FourthTerm implements Param
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
            new GetFloatOrDefault(0),
            new MinIntValue(-1000),
            new MaxIntValue(1000),
        );
    }

//class FourthTerm extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return '';
//    }
//
//    protected function getMin()
//    {
//        return -1000;
//    }
//
//    protected function getMax()
//    {
//        return 10000;
//    }
//
//    protected function getVariableName()
//    {
//        return 'fourthTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Fourth term';
//    }
//
//    public function getFourthTerm()
//    {
//        return $this->getValue();
//    }
}
