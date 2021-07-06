<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Length implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(20),
            new MinIntValue(0),
            new MaxIntValue(500),
        );
    }

//class Length extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 20;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 500;
//    }
//
//    protected function getVariableName()
//    {
//        return 'length';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Length';
//    }
//
//    public function getLength()
//    {
//        return $this->getValue();
//    }
}
