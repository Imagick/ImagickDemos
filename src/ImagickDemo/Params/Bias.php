<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Bias implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0.5),
            new MinIntValue(0),
            new MaxIntValue(1),
        );
    }

//class  extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 0.5;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'bias';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Bias';
//    }
//
//    public function getBias()
//    {
//        return $this->getValue();
//    }
//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
}
