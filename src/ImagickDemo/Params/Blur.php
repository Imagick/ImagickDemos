<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;


class Blur implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(1),
            new MinIntValue(0),
            new MaxIntValue(50),
        );
    }

//class Blur extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 1;
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
//        return 'blur';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Blur';
//    }
//
//    public function getBlur()
//    {
//        return $this->getValue();
//    }
}
