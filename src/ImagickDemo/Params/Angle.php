<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Angle implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(45),
            new MinIntValue(0),
            new MaxIntValue(360),
        );
    }

//class Angle extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 45;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 360;
//    }
//
//    protected function getVariableName()
//    {
//        return 'angle';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Angle';
//    }
//
//    public function getAngle()
//    {
//        return $this->getValue();
//    }
}
