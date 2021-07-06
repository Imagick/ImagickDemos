<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class SkewAmount implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(10),
            new RangeFloatValue(-500, 500)
        );
    }

//class Skew extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 10;
//    }
//
//    protected function getMin()
//    {
//        return -500;
//    }
//
//    protected function getMax()
//    {
//        return 500;
//    }
//
//    protected function getVariableName()
//    {
//        return 'skew';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Skew';
//    }
//
//    public function getSkew()
//    {
//        return $this->getValue();
//    }
}
