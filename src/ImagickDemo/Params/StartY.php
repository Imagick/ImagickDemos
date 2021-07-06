<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class StartY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(50),
            new RangeIntValue(0, 250)
        );
    }

//class StartY extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 50;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 250;
//    }
//
//    protected function getVariableName()
//    {
//        return 'startY';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Start Y';
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    public function getStartY()
//    {
//        return $this->getValue();
//    }
}
