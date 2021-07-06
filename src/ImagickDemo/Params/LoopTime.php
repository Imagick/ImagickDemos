<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class LoopTime implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(160),
            new RangeIntValue(0, 1024)
        );
    }

//class LoopTime extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 160;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 1024;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'loopTime';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Loop time';
//    }
//
//    public function getLoopTime()
//    {
//        return $this->getValue();
//    }
}
