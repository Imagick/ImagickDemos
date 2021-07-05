<?php

namespace ImagickDemo\Params;

// TODO - this should just be a 'coloramount' and then be re-used for other channels


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

class A implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(100),
            new RangeIntValue(0, 255)
        );
    }

//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 100;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 255;
//    }
//
//    protected function getVariableName()
//    {
//        return 'a';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'A';
//    }
//
//    public function getA()
//    {
//        return $this->getValue();
//    }
}
