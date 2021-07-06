<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class SecondTerm implements Param
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
            new MaxIntValue(10000),
        );
    }

//class SecondTerm extends ValueElement
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
//        return 'secondTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Second term';
//    }
//
//    public function getSecondTerm()
//    {
//        return $this->getValue();
//    }
}
