<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

class Midpoint implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(4),
            new RangeIntValue(-100, 100)
        );
    }

//class Midpoint extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 4;
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
//        return 'midpoint';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Midpoint';
//    }
//
//    public function getMidpoint()
//    {
//        return $this->getValue();
//    }
}
