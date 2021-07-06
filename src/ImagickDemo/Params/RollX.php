<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class RollX implements Param
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

//class RollX extends ValueElement
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
//        return 'rollX';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Roll X';
//    }
//
//    public function getRollX()
//    {
//        return $this->getValue();
//    }
}
