<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

class NumberLevels implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(8),
            new RangeIntValue(0, 256)
        );
    }
//
//class NumberLevels extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 8;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 256;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'numberLevels';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Number Levels';
//    }
//
//    public function getNumberLevels()
//    {
//        return $this->getValue();
//    }
}
