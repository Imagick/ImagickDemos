<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class InnerBevel implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(3),
            new MinIntValue(0),
            new MaxIntValue(50),
        );
    }

//class InnerBevel extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 3;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 50;
//    }
//
//    protected function getVariableName()
//    {
//        return 'innerBevel';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Inner bevel';
//    }
//
//    public function getInnerBevel()
//    {
//        return $this->getValue();
//    }
}
