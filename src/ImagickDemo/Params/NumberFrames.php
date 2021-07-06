<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class NumberFrames implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(25),
            new RangeIntValue(0, 512)
        );
    }

//class NumberFrames extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 25;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 512;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'numberFrames';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Integer of frames';
//    }
//
//    public function getNumberFrames()
//    {
//        return $this->getValue();
//    }
}
