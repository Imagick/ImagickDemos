<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class Radius implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(5),
            new RangeFloatValue(0, 10)
        );
    }

//class Radius extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 5;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 10;
//    }
//
//    protected function getVariableName()
//    {
//        return 'radius';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Radius';
//    }
//
//    public function getRadius()
//    {
//        return $this->getValue();
//    }
}
