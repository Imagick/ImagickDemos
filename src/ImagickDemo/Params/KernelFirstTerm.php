<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class KernelFirstTerm implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(2),
            new MinIntValue(1),
            new MaxIntValue(5),
        );
    }

//class KernelFirstTerm extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return '2';
//    }
//
//    protected function getMin()
//    {
//        return 1;
//    }
//
//    protected function getMax()
//    {
//        return 5;
//    }
//
//    protected function getVariableName()
//    {
//        return 'kernelFirstTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'First term';
//    }
//
//    public function getKernelFirstTerm()
//    {
//        return $this->getValue();
//    }
}
