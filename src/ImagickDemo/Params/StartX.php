<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class StartX implements Param
{
    public function __construct(
        private int $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault($this->default),
            new RangeIntValue(0, 250)
        );
    }

//class StartX extends ValueElement
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
//        return 'startX';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Start X';
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    public function getStartX()
//    {
//        return $this->getValue();
//    }
}
