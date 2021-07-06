<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Brightness implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(-20),
            new MinIntValue(-100),
            new MaxIntValue(100),
        );
    }

//class Brightness extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return -20;
//    }
//
//    protected function getMin()
//    {
//        return -100;
//    }
//
//    protected function getMax()
//    {
//        return 100;
//    }
//
//    protected function getVariableName()
//    {
//        return 'brightness';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Brightness';
//    }
//
//    public function getBrightness()
//    {
//        return $this->getValue();
//    }
}
