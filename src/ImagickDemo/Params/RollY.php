<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class RollY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(100),
            new RangeIntValue(0, 800)
        );
    }

//class RollY extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 100;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 800;
//    }
//
//    protected function getVariableName()
//    {
//        return 'rollY';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Roll Y';
//    }
//
//    public function getRollY()
//    {
//        return $this->getValue();
//    }
}
