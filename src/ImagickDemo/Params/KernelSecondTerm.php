<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

#[\Attribute]
class KernelSecondTerm implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0),
            new MinFloatValue(0),
            new MaxFloatValue(5),
        );
    }

//class KernelSecondTerm extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return false;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 5;
//    }
//
//    protected function getVariableName()
//    {
//        return 'kernelSecondTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Second term';
//    }
//
//    public function getKernelSecondTerm()
//    {
//        return $this->getValue();
//    }
}
