<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class W20 implements Param
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
            new RangeFloatValue(0, 20)
        );
    }

//class W20 extends ValueElement
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
//        return 20;
//    }
//
//    protected function getVariableName()
//    {
//        return 'w20';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Width';
//    }
//
//    public function getW20()
//    {
//        return $this->getValue();
//    }
}
