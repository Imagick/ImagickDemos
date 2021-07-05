<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;


class Amount implements Param
{

    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(5),
            new MinIntValue(0),
            new MaxIntValue(20),
        );
    }

//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 5;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 20;
//    }
//
//    protected function getVariableName()
//    {
//        return 'amount';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Amount';
//    }
//
//    public function getAmount()
//    {
//        return $this->getValue();
//    }
}
